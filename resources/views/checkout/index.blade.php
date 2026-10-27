@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-lg-8">

            <h1 class="mb-4">
                Checkout
            </h1>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Checkout Options --}}

            <div class="card mb-4">

                <div class="card-body">

                    <h4 class="mb-4">
                        How would you like to checkout?
                    </h4>

                   @if(!auth()->guard('customer')->check())

    <div class="card mb-3">

        <div class="card-body">

            <h4>
                Returning Customer?
            </h4>

            <p class="text-muted">
                Login to use your saved information and view your orders.
            </p>

            <a
                href="{{ route('customer.login') }}"
                class="btn btn-primary"
            >
                Login
            </a>

        </div>

    </div>


    <div class="card mb-3">

        <div class="card-body">

            <h4>
                New Customer?
            </h4>

            <p class="text-muted">
                Create an account for faster checkout and order tracking.
            </p>

            <a
                href="{{ route('customer.signup') }}"
                class="btn btn-outline-primary"
            >
                Create Account
            </a>

        </div>

    </div>


    <div class="card">

        <div class="card-body">

            <h4>
                Checkout as Guest
            </h4>

            <p class="text-muted">
                Don't want to create an account?
            </p>

            <a
                href="{{ route('checkout.details') }}"
                class="btn btn-outline-secondary"
            >
                Continue as Guest
            </a>

        </div>

    </div>

@else

    <div class="alert alert-success">
        Welcome back,
        <strong>
            {{ auth()->guard('customer')->user()->name }}
        </strong>
    </div>

    <a
        href="{{ route('checkout.details') }}"
        class="btn btn-primary btn-lg"
    >
        Continue Checkout
    </a>

@endif



                    

                </div>

            </div>

        </div>


        {{-- Order Summary --}}

        <div class="col-lg-4">

            <div class="card">

                <div class="card-body">

                    <h4 class="mb-4">
                        Order Summary
                    </h4>

                    @foreach($cartItems as $item)

                        <div class="d-flex justify-content-between mb-3">

                            <div>
                                <strong>
                                    {{ $item->product->name }}
                                </strong>

                                <div class="text-muted">
                                    Qty: {{ $item->quantity }}
                                </div>
                            </div>

                            <div>
                                ${{ number_format(
                                    (($item->product->price)-($item->product->discount_price)) * $item->quantity,
                                    2
                                ) }}
                            </div>

                        </div>

                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between">

                        <strong>
                            Total
                        </strong>

                        <strong class="fs-4">
                            ${{ number_format($subtotal, 2) }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
