<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ShippingMethod;
use App\Models\PaymentMethod;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class CheckoutController extends Controller
{
    private function getCartItems()
{
    if (auth('customer')->check()) {

        return Cart::with('product')
            ->where('customer_id', auth('customer')->id())
            ->get();

    }

    return Cart::with('product')
        ->where('session_id', session()->getId())
        ->whereNull('customer_id')
        ->get();
}


    public function index()
    {
        $cartItems = $this->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return (($item->product->price)-($item->product->discount_price)) * $item->quantity;
        });

        return view('checkout.index', compact(
            'cartItems',
            'subtotal'
        ));
    }

    public function guest()
    {
        $cartItems = $this->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        session([
            'checkout_type' => 'guest',
        ]);

        return redirect()
            ->route('checkout.next');
    }

    public function signup()
    {
        return view('checkout.signup');
    }

    public function storeSignup(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'confirmed',
                'min:8',
            ],
        ]);

        $guestSessionId = session()->getId();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        /*
         * Move guest cart to user's cart
         */
        Cart::where('session_id', $guestSessionId)
            ->whereNull('user_id')
            ->update([
                'user_id' => $user->id,
                'session_id' => null,
            ]);

        Auth::login($user);

        session([
            'checkout_type' => 'registered',
        ]);

        return redirect()
            ->route('checkout.next');
    }

    public function next()
    {
        $cartItems = $this->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(function ($item) {
            return (($item->product->price)-($item->product->discount_price)) * $item->quantity;
        });

        return view('checkout.details', compact(
            'cartItems',
            'subtotal'
        ));
    }

    public function details()
    {
        $cartItems = $this->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $shippingMethods = ShippingMethod::where('is_active', true)
            ->orderBy('price')
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return (($item->product->price)-($item->product->discount_price)) * $item->quantity;
        });

        return view('checkout.details', compact(
            'cartItems',
            'shippingMethods',
            'subtotal'
        ));
    }

    public function payment()
    {
        $cartItems = $this->getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        if (!session()->has('checkout_data')) {
            return redirect()
                ->route('checkout.details');
        }

        $checkoutData = session('checkout_data');

        $shippingMethod = ShippingMethod::find(
            $checkoutData['shipping_method_id']
        );

        if (!$shippingMethod) {
            return redirect()
                ->route('checkout.details')
                ->with('error', 'Please select a shipping method.');
        }

        $paymentMethods = PaymentMethod::where('is_active', true)
            ->get();

        $subtotal = $cartItems->sum(function ($item) {
            return (($item->product->price)-($item->product->discount_price)) * $item->quantity;
        });

        $total = $subtotal + $shippingMethod->price;

        return view('checkout.payment', compact(
            'cartItems',
            'subtotal',
            'shippingMethod',
            'paymentMethods',
            'total'
        ));
    }


    public function saveDetails(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'email' => 'required|email|max:255',

            'phone' => 'required|string|max:30',

            'address' => 'required|string|max:1000',

            'city' => 'required|string|max:255',

            'state' => 'nullable|string|max:255',

            'postal_code' => 'nullable|string|max:30',

            'shipping_method_id' => [
                'required',
                'exists:shipping_methods,id',
            ],
        ]);

        $shippingMethod = ShippingMethod::where('id', $request->shipping_method_id)
            ->where('is_active', true)
            ->firstOrFail();

        session([
            'checkout_data' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,

                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,

                'shipping_method_id' => $shippingMethod->id,
                'shipping_method' => $shippingMethod->name,
                'shipping_amount' => $shippingMethod->price,
            ],
        ]);

        return redirect()
            ->route('checkout.payment');
    }

    public function placeOrder(Request $request)
{
    $request->validate([
        'payment_method_id' => [
            'required',
            'exists:payment_methods,id',
        ],
    ]);

    $cartItems = $this->getCartItems();

    if ($cartItems->isEmpty()) {
        return redirect()
            ->route('cart.index')
            ->with('error', 'Your cart is empty.');
    }

    $checkoutData = session('checkout_data');

    if (!$checkoutData) {
        return redirect()
            ->route('checkout.details')
            ->with('error', 'Please complete your shipping information.');
    }

    $shippingMethod = ShippingMethod::find(
        $checkoutData['shipping_method_id']
    );

    if (!$shippingMethod) {
        return redirect()
            ->route('checkout.details')
            ->with('error', 'Invalid shipping method.');
    }

    $paymentMethod = PaymentMethod::where('id', $request->payment_method_id)
        ->where('is_active', true)
        ->firstOrFail();

    /*
     * Verify stock before creating order
     */
    foreach ($cartItems as $item) {

        if (!$item->product->is_active) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    $item->product->name . ' is no longer available.'
                );
        }

        if ($item->quantity > $item->product->stock) {
            return redirect()
                ->route('cart.index')
                ->with(
                    'error',
                    'Not enough stock for ' . $item->product->name
                );
        }
    }

    $subtotal = $cartItems->sum(function ($item) {
       return (($item->product->price)-($item->product->discount_price)) * $item->quantity;
    });

    $shippingAmount = $shippingMethod->price;

    $total = $subtotal + $shippingAmount;


    $order = DB::transaction(function () use (
        $cartItems,
        $checkoutData,
        $shippingMethod,
        $paymentMethod,
        $subtotal,
        $shippingAmount,
        $total
    ) {

        $order = Order::create([

            'customer_id' => auth()
                ->guard('customer')
                ->id(),

            'order_number' => 'ORD-' . strtoupper(
                Str::random(10)
            ),

            'customer_name' => $checkoutData['name'],

            'customer_email' => $checkoutData['email'],

            'customer_phone' => $checkoutData['phone'],

            'shipping_address' => $checkoutData['address'],

            'shipping_city' => $checkoutData['city'],

            'shipping_state' => $checkoutData['state'] ?? null,

            'shipping_postal_code' =>
                $checkoutData['postal_code'] ?? null,

            'shipping_method' =>
                $shippingMethod->name,

            'shipping_amount' =>
                $shippingAmount,

            'payment_method' =>
                $paymentMethod->name,

            'payment_status' =>
                $paymentMethod->code === 'cod'
                    ? 'pending'
                    : 'pending',

            'subtotal' => $subtotal,

            'total' => $total,

            'status' => 'pending',
        ]);


        foreach ($cartItems as $item) {

            OrderItem::create([

                'order_id' => $order->id,

                'product_id' => $item->product->id,

                'product_name' =>
                    $item->product->name,

                'price' =>
                    $item->product->price,

                'quantity' =>
                    $item->quantity,

                'total' =>
                    $item->product->price *
                    $item->quantity,
            ]);


            /*
             * Reduce stock
             */
            $item->product->decrement(
                'stock',
                $item->quantity
            );
        }

        return $order;
    });


    /*
     * Clear cart
     */
    $cartItems->each(function ($item) {
        $item->delete();
    });


    /*
     * Clear checkout session
     */
    session()->forget('checkout_data');


    return redirect()
        ->route('checkout.success', $order);
}

public function success(Order $order)
{
    if (
        auth()->guard('customer')->check() &&
        $order->customer_id !== auth()->guard('customer')->id()
    ) {
        abort(403);
    }

    return view('checkout.success', compact('order'));
}


public function addToCart(Request $request, Product $product)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $quantity = $request->quantity;

    if ($quantity > $product->stock) {
        return back()->with('error', 'Not enough stock available.');
    }

    $customerId = auth('customer')->id();

    if ($customerId) {

        $cartItem = Cart::where('customer_id', $customerId)
            ->where('product_id', $product->id)
            ->first();

    } else {

        $cartItem = Cart::where('session_id', session()->getId())
            ->whereNull('customer_id')
            ->where('product_id', $product->id)
            ->first();
    }

    if ($cartItem) {

        $newQuantity = $cartItem->quantity + $quantity;

        if ($newQuantity > $product->stock) {
            return back()->with(
                'error',
                'You cannot add more than the available stock.'
            );
        }

        $cartItem->update([
            'quantity' => $newQuantity,
        ]);

    } else {

        Cart::create([
            'customer_id' => $customerId,
            'product_id' => $product->id,
            'quantity' => $quantity,
            'session_id' => $customerId
                ? null
                : session()->getId(),
        ]);
    }

    return redirect()
        ->route('cart.index')
        ->with('success', 'Product added to cart.');
}

private function mergeGuestCart(Customer $customer)
{
    $guestItems = Cart::where('session_id', session()->getId())
        ->whereNull('customer_id')
        ->get();

    foreach ($guestItems as $guestItem) {

        $existingItem = Cart::where('customer_id', $customer->id)
            ->where('product_id', $guestItem->product_id)
            ->first();

        if ($existingItem) {

            $existingItem->increment(
                'quantity',
                $guestItem->quantity
            );

            $guestItem->delete();

        } else {

            $guestItem->update([
                'customer_id' => $customer->id,
                'session_id' => null,
            ]);
        }
    }
}

}
