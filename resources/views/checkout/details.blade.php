@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <div class="row">

        <div class="col-lg-8">

            <h1 class="mb-4">
                Checkout
            </h1>

            <form
                action="{{ route('checkout.details.save') }}"
                method="POST"
            >

                @csrf

                {{-- Customer Information --}}

                <div class="card mb-4">

                    <div class="card-body">

                        <h4 class="mb-4">
                            Contact Information
                        </h4>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Full Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    value="{{ old(
                                        'name',
                                        auth()->guard('customer')->user()->name ?? ''
                                    ) }}"
                                    class="form-control"
                                    required
                                >

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old(
                                        'email',
                                        auth()->guard('customer')->user()->email ?? ''
                                    ) }}"
                                    class="form-control"
                                    required
                                >

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Phone
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old(
                                        'phone',
                                        auth()->guard('customer')->user()->phone ?? ''
                                    ) }}"
                                    class="form-control"
                                    required
                                >

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Shipping Address --}}

                <div class="card mb-4">

                    <div class="card-body">

                        <h4 class="mb-4">
                            Shipping Address
                        </h4>

                        <div class="mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea
                                name="address"
                                class="form-control"
                                rows="3"
                                required
                            >{{ old('address') }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    City
                                </label>

                                <input
                                    type="text"
                                    name="city"
                                    value="{{ old('city') }}"
                                    class="form-control"
                                    required
                                >

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    State / Province
                                </label>

                                <input
                                    type="text"
                                    name="state"
                                    value="{{ old('state') }}"
                                    class="form-control"
                                    required
                                >

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Postal Code
                                </label>

                                <input
                                    type="text"
                                    name="postal_code"
                                    value="{{ old('postal_code') }}"
                                    class="form-control"
                                >

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Shipping Method --}}

                <div class="card mb-4">

                    <div class="card-body">

                        <h4 class="mb-4">
                            Shipping Method
                        </h4>

                        @foreach($shippingMethods as $method)

                            <div class="border rounded p-3 mb-3">

                                <div class="form-check">

                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="shipping_method_id"
                                        id="shipping_{{ $method->id }}"
                                        value="{{ $method->id }}"
                                        checked="checked"
                                        required
                                    >

                                    <label
                                        class="form-check-label w-100"
                                        for="shipping_{{ $method->id }}"
                                    >

                                        <div class="d-flex justify-content-between">

                                            <strong>
                                                {{ $method->name }}
                                            </strong>

                                            <strong>
                                                ${{ number_format(
                                                    $method->price,
                                                    2
                                                ) }}
                                            </strong>

                                        </div>

                                        <div class="text-muted small mt-1">

                                            {{ $method->description }}

                                            @if($method->estimated_days)
                                                —
                                                {{ $method->estimated_days }}
                                                days
                                            @endif

                                        </div>

                                    </label>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>


                <button
                    type="submit"
                    class="btn btn-primary btn-lg"
                >
                    Next
                </button>

            </form>

        </div>


        {{-- Summary --}}

        <div class="col-lg-4">

            <div class="card">

                <div class="card-body">

                    <h4 class="mb-4">
                        Your Order
                    </h4>

                    @foreach($cartItems as $item)

                        <div class="d-flex justify-content-between mb-3">

                            <div>

                                {{ $item->product->name }}

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

                    <div class="d-flex justify-content-between">

                        <span>
                            Subtotal
                        </span>

                        <strong>
                            ${{ number_format($subtotal, 2) }}
                        </strong>

                    </div>

                    <div class="text-muted small mt-2">
                        Shipping will be added after you select a method.
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
