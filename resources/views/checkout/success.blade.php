@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm">

                <div class="card-body text-center p-5">

                    <div
                        class="mb-4 mx-auto d-flex align-items-center justify-content-center rounded-circle bg-success text-white"
                        style="width: 80px; height: 80px;"
                    >
                        <span class="fs-1">
                            ✓
                        </span>
                    </div>

                    <h1 class="mb-3">
                        Thank You!
                    </h1>

                    <p class="lead">
                        Your order has been placed successfully.
                    </p>

                    <p class="text-muted">
                        We've received your order and will process it shortly.
                    </p>

                    <div class="bg-light rounded p-4 my-4">

                        <div class="mb-2">
                            <span class="text-muted">
                                Order Number
                            </span>
                        </div>

                        <h3>
                            {{ $order->order_number }}
                        </h3>

                    </div>

                    <div class="text-start mb-4">

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                Payment Method
                            </span>

                            <strong>
                                {{ $order->payment_method }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mb-2">

                            <span>
                                Shipping Method
                            </span>

                            <strong>
                                {{ $order->shipping_method }}
                            </strong>

                        </div>

                        <div class="d-flex justify-content-between">

                            <span>
                                Total
                            </span>

                            <strong class="fs-5">
                                ${{ number_format($order->total, 2) }}
                            </strong>

                        </div>

                    </div>

                    @if($order->payment_method === 'Cash on Delivery')

                        <div class="alert alert-info text-start">

                            <strong>
                                Cash on Delivery
                            </strong>

                            <br>

                            Please keep
                            <strong>
                                ${{ number_format($order->total, 2) }}
                            </strong>
                            ready when your order arrives.

                        </div>

                    @endif

                    <div class="d-flex justify-content-center gap-2">

                        <a
                            href="{{ url('/') }}"
                            class="btn btn-primary"
                        >
                            Continue Shopping
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
