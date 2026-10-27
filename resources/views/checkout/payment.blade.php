@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-lg-8">

            <h1 class="mb-4">
                Payment Method
            </h1>

            <form
                action="{{ route('checkout.payment.place') }}"
                method="POST"
            >

                @csrf

                <div class="card mb-4">

                    <div class="card-body">

                        <h4 class="mb-4">
                            Choose Payment Method
                        </h4>

                        @foreach($paymentMethods as $method)

                            <div class="border rounded p-4 mb-3">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="payment_method_id"
                                        value="{{ $method->id }}"
                                        id="payment_{{ $method->id }}"
                                        checked="checked"
                                        required
                                    >

                                    <label
                                        class="form-check-label w-100"
                                        for="payment_{{ $method->id }}"
                                    >

                                        <div class="d-flex align-items-center">

                                            <div>

                                                <strong>
                                                    {{ $method->name }}
                                                </strong>

                                                @if($method->description)

                                                    <div class="text-muted small mt-1">
                                                        {{ $method->description }}
                                                    </div>

                                                @endif

                                            </div>

                                        </div>

                                    </label>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                <div class="d-flex justify-content-between">

                    <a
                        href="{{ route('checkout.details') }}"
                        class="btn btn-outline-secondary"
                    >
                        Back
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary btn-lg"
                    >
                        Place Order
                    </button>

                </div>

            </form>

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

                            <strong>
                                ${{ number_format(
                                    $item->product->price *
                                    $item->quantity,
                                    2
                                ) }}
                            </strong>

                        </div>

                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between mb-2">

                        <span>
                            Subtotal
                        </span>

                        <span>
                            ${{ number_format($subtotal, 2) }}
                        </span>

                    </div>

                    <div class="d-flex justify-content-between mb-3">

                        <span>
                            {{ $shippingMethod->name }}
                        </span>

                        <span>
                            ${{ number_format(
                                $shippingMethod->price,
                                2
                            ) }}
                        </span>

                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">

                        <strong>
                            Total
                        </strong>

                        <strong class="fs-4">
                            ${{ number_format($total, 2) }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
