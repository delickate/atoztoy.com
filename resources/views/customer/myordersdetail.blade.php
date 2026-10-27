@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <div class="row">

        {{-- SIDEBAR --}}

        

            <div class="card">

               

        <div class="card-header">
            <h5 class="mb-0">Customer Information</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <strong>Name</strong>
                    <div>{{ $order->customer_name }}</div>
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Email</strong>
                    <div>{{ $order->customer_email }}</div>
                </div>

                <div class="col-md-4 mb-3">
                    <strong>Phone</strong>
                    <div>{{ $order->customer_phone ?: '-' }}</div>
                </div>

            </div>

        </div>

    </div>

    {{-- Shipping Information --}}
    <div class="card mb-4">

        <div class="card-header">
            <h5 class="mb-0">Shipping Information</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <strong>Address</strong>
                    <div>{{ $order->shipping_address }}</div>
                </div>

                <div class="col-md-3 mb-3">
                    <strong>City</strong>
                    <div>{{ $order->shipping_city }}</div>
                </div>

                <div class="col-md-3 mb-3">
                    <strong>State</strong>
                    <div>{{ $order->shipping_state }}</div>
                </div>

                <div class="col-md-3 mb-3">
                    <strong>Postal Code</strong>
                    <div>{{ $order->shipping_postal_code }}</div>
                </div>

                <div class="col-md-3 mb-3">
                    <strong>Shipping Method</strong>
                    <div>{{ $order->shipping_method }}</div>
                </div>

                <div class="col-md-3 mb-3">
                    <strong>Shipping Amount</strong>
                    <div>
                        {{ number_format($order->shipping_amount, 2) }}
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Payment Information --}}
    <div class="card mb-4">

        <div class="card-header">
            <h5 class="mb-0">Payment Information</h5>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4">
                    <strong>Payment Method</strong>
                    <div>{{ $order->payment_method }}</div>
                </div>

                <div class="col-md-4">
                    <strong>Payment Status</strong>
                    <div>
                        @if($order->payment_status === 'paid')
                            <span class="badge bg-success">
                                Paid
                            </span>
                        @elseif($order->payment_status === 'pending')
                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <strong>Order Status</strong>
                    <div>
                        {{ ucfirst($order->status) }}
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Order Items --}}
    <div class="card mb-4">

        <div class="card-header">
            <h5 class="mb-0">Order Items</h5>
        </div>

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th>Product</th>
                            <th width="150">Price</th>
                            <th width="100">Quantity</th>
                            <th width="150">Total</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($order->items as $item)

                            <tr>

                                <td>
                                    {{ $item->product_name }}
                                </td>

                                <td>
                                    {{ number_format($item->price, 2) }}
                                </td>

                                <td>
                                    {{ $item->quantity }}
                                </td>

                                <td>
                                    {{ number_format($item->total, 2) }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4"
                                    class="text-center text-muted py-4">
                                    No items found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- Order Totals --}}
    <div class="row justify-content-end">

        <div class="col-md-5">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>

                        <strong>
                            {{ number_format($order->subtotal, 2) }}
                        </strong>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>

                        <strong>
                            {{ number_format($order->shipping_amount, 2) }}
                        </strong>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <strong>Total</strong>

                        <strong>
                            {{ number_format($order->total, 2) }}
                        </strong>
                    </div>

                </div>

            </div>

        </div>

    </div>
                
       
    </div> 
</div>   

@endsection