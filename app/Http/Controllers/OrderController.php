<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer')
            ->latest('id')
            ->paginate(15);

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load([
            'customer',
            'items.product',
        ]);

        return view('orders.show', compact('order'));
    }
}
