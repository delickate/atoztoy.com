<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Order;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest('id')
            ->paginate(15);

        return view('customer.index', compact('customers'));
    }

    public function myorders()
    {
        $customerId = session('customer_id');

        $orders = Order::with('customer')
            ->where('customer_id', $customerId)
            ->latest('id')
            ->paginate(15);

        return view('customer.myorders', compact('orders'));
    }

    public function myordersdetail(Order $order)
    {
        $order->load([
            'customer',
            'items.product',
        ]);

        return view('customer.myordersdetail', compact('order'));
    }
}
