@extends('layouts.frontend')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-body p-4">

                    <h2 class="mb-4">
                        Customer Login
                    </h2>

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form
                        action="{{ route('customer.login.authenticate') }}"
                        method="POST"
                    >

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                required
                            >

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label>
                                <input
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                >

                                Remember me
                            </label>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            Login
                        </button>

                    </form>

                    <div class="text-center mt-4">

                        Don't have an account?

                        <a href="{{ route('customer.signup') }}">
                            Create Account
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
