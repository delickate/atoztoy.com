@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <div class="row">

   
                <div class="card-body">

                     <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Order Number</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Payment</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Subtotal</th>
                    <th>Shipping</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th width="100">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>
                            {{ $order->id }}
                        </td>

                        <td>
                            <strong>{{ $order->order_number }}</strong>
                        </td>

                        <td>
                            <div>
                                {{ $order->customer_name }}
                            </div>

                            <small class="text-muted">
                                {{ $order->customer_email }}
                            </small>
                        </td>

                        <td>
                            {{ $order->customer_phone ?: '-' }}
                        </td>

                        <td>
                            {{ $order->payment_method ?: '-' }}
                        </td>

                        <td>
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
                        </td>

                        <td>
                            @if($order->status === 'completed')
                                <span class="badge bg-success">
                                    Completed
                                </span>
                            @elseif($order->status === 'pending')
                                <span class="badge bg-warning text-dark">
                                    Pending
                                </span>
                            @elseif($order->status === 'cancelled')
                                <span class="badge bg-danger">
                                    Cancelled
                                </span>
                            @elseif($order->status === 'processing')
                                <span class="badge bg-info">
                                    Processing
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    {{ ucfirst($order->status) }}
                                </span>
                            @endif
                        </td>

                        <td>
                            {{ number_format($order->subtotal, 2) }}
                        </td>

                        <td>
                            {{ number_format($order->shipping_amount, 2) }}
                        </td>

                        <td>
                            <strong>
                                {{ number_format($order->total, 2) }}
                            </strong>
                        </td>

                        <td>
                            {{ $order->created_at?->format('Y-m-d H:i') }}
                        </td>

                        <td>
                            <a href="{{ route('customer.myordersdetail', $order) }}"
                               class="btn btn-sm btn-primary">
                                Details
                            </a>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="12"
                            class="text-center text-muted py-4">
                            No orders found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $orders->links() }}
    </div>

                
        </div> 
    </div> 
</div>   

@endsection