@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <div class="row">

        {{-- SIDEBAR --}}

        <div class="col-lg-3 mb-4">

            <div class="card">

                <div class="card-body">

                    <div class="text-center mb-4">

                        <div
                            class="rounded-circle bg-light mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width:80px;height:80px;"
                        >

                            <i class="fa fa-user fa-2x text-muted"></i>

                        </div>

                        <h5 class="mb-1">

                            {{ auth('customer')->user()->name }}

                        </h5>

                        <small class="text-muted">

                            {{ auth('customer')->user()->email }}

                        </small>

                    </div>


                    <ul class="list-group">

                        <li class="list-group-item active">

                            My Account

                        </li>

                         <li class="list-group-item">

                            <a href="{{ route('customer.myorders') }}">
                                My Orders
                            </a>

                        </li>
<!--
                        <li class="list-group-item">

                            <a href="#">
                                Wishlist
                            </a>

                        </li>

                        <li class="list-group-item">

                            <a href="#">
                                Addresses
                            </a>

                        </li> -->

                        <li class="list-group-item">

                            <form
                                action="{{ route('customer.logout') }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-link p-0 text-danger"
                                >
                                    Logout
                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            </div>

        </div>


        {{-- CONTENT --}}

        <div class="col-lg-9">

            <h2 class="mb-4">
                My Account
            </h2>

            <div class="card">

                <div class="card-body">

                    <h4>
                        Welcome,
                        {{ auth('customer')->user()->name }}
                    </h4>

                    <p class="text-muted">
                        From your account dashboard you can view your orders,
                        manage your addresses and update your account details.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
