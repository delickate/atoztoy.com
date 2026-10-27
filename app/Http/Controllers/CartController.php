<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Get current customer's or guest's cart.
     */
    private function getCartItems()
    {
        // Logged-in ecommerce customer
        if (Auth::guard('customer')->check()) {

            return Cart::with('product')
                ->where(
                    'customer_id',
                    Auth::guard('customer')->id()
                )
                ->get();
        }

        // Guest customer
        return Cart::with('product')
            ->where(
                'session_id',
                session()->getId()
            )
            ->whereNull('customer_id')
            ->get();
    }


    /**
     * Cart page.
     */
    public function index()
    {
        $cartItems = $this->getCartItems();

        $subtotal = $cartItems->sum(function ($item) {

            return (($item->product->price)-($item->product->discount_price)) * $item->quantity;

        });

        return view('cart.index', compact(
            'cartItems',
            'subtotal'
        ));
    }


    /**
     * Add product to cart.
     */
    public function add(Request $request, Product $product)
    {
        if (!$product->is_active) {
            abort(404);
        }

        if ($product->stock < 1) {

            return back()->with(
                'error',
                'This product is out of stock.'
            );
        }

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $quantity = $request->quantity;

        if ($quantity > $product->stock) {

            return back()->with(
                'error',
                'Requested quantity is not available.'
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Find Existing Cart Item
        |--------------------------------------------------------------------------
        */

        $query = Cart::where(
            'product_id',
            $product->id
        );


        // Logged-in ecommerce customer
        if (Auth::guard('customer')->check()) {

            $query->where(
                'customer_id',
                Auth::guard('customer')->id()
            );

        }

        // Guest
        else {

            $query->where(
                'session_id',
                session()->getId()
            )
            ->whereNull('customer_id');

        }


        $cartItem = $query->first();


        /*
        |--------------------------------------------------------------------------
        | Update Existing Item
        |--------------------------------------------------------------------------
        */

        if ($cartItem) {

            $newQuantity =
                $cartItem->quantity + $quantity;

            if ($newQuantity > $product->stock) {

                return back()->with(
                    'error',
                    'You cannot add more than the available stock.'
                );
            }

            $cartItem->update([
                'quantity' => $newQuantity,
            ]);

        }


        /*
        |--------------------------------------------------------------------------
        | Create New Item
        |--------------------------------------------------------------------------
        */

        else {

            $customerId = Auth::guard('customer')->id();

            Cart::create([

                'customer_id' => $customerId,

                'session_id' => $customerId
                    ? null
                    : session()->getId(),

                'product_id' => $product->id,

                'quantity' => $quantity,

            ]);
        }


        return redirect()
            ->route('cart.index')
            ->with(
                'success',
                'Product added to cart.'
            );
    }


    /**
     * Remove product from cart.
     */
    public function remove(Cart $cart)
    {
        /*
        |--------------------------------------------------------------------------
        | Logged-in customer
        |--------------------------------------------------------------------------
        */

        if (Auth::guard('customer')->check()) {

            if (
                $cart->customer_id
                !== Auth::guard('customer')->id()
            ) {
                abort(403);
            }

        }


        /*
        |--------------------------------------------------------------------------
        | Guest
        |--------------------------------------------------------------------------
        */

        else {

            if (
                $cart->session_id
                !== session()->getId()
                || $cart->customer_id !== null
            ) {
                abort(403);
            }
        }


        $cart->delete();

        return back()->with(
            'success',
            'Product removed from cart.'
        );
    }
}
