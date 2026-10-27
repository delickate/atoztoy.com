@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <h1 class="mb-4">Shopping Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($cartItems->isEmpty())

        <div class="text-center py-5">

            <h3>Your cart is empty</h3>

            <p class="text-muted">
                You haven't added any products yet.
            </p>

            <a href="{{ route('shop.categories.show') }}"
               class="btn btn-primary">
                Continue Shopping
            </a>

        </div>

    @else

        <div class="row">

            <div class="col-lg-8">

                @foreach($cartItems as $item)

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="row align-items-center">

                                <div class="col-md-2">

                                    <img
                                        src="{{ $item->product->thumb_image
                                            ? asset('storage/' . $item->product->thumb_image)
                                            : asset('assets/images/default-product.png') }}"
                                        alt="{{ $item->product->name }}"
                                        class="img-fluid rounded"
                                    >

                                </div>

                                <div class="col-md-4">

                                    <h5 class="mb-1">
                                        {{ $item->product->name }}
                                    </h5>

                                    <div class="text-muted">
                                        ${{ number_format($item->product->price-$item->product->discount_price, 2) }}
                                    </div>

                                    

                                </div>

                                <div class="col-md-2">

                                    <span>
                                        Qty: {{ $item->quantity }}
                                    </span>

                                </div>

                                <div class="col-md-2">

                                    <strong>
<?php
$price      = $item->product->price;
$discount   = $item->product->discount_price;
$finalprice = $price - $discount;

?>
 ${{ number_format($finalprice * $item->quantity, 2) }}

                                        
                                    </strong>

                                </div>

                                <div class="col-md-2">

                                    <form
                                        action="{{ route('cart.remove', $item) }}"
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm"
                                        >
                                            Remove
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- Cart Summary --}}

            <div class="col-lg-4">

                <div class="card">

                    <div class="card-body">

                        <h4 class="mb-4">
                            Order Summary
                        </h4>

                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal</span>

                            <strong>
                                ${{ number_format($subtotal, 2) }}
                            </strong>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-4">

                            <strong>Total</strong>

                            <strong class="fs-4">
                                ${{ number_format($subtotal, 2) }}
                            </strong>

                        </div>

                        <a
                            href="{{ route('checkout.index') }}"
                            class="btn btn-primary w-100 btn-lg"
                        >
                            Proceed to Checkout
                        </a>

                    </div>

                </div>

            </div>

        </div>

    @endif

</div>

@endsection
