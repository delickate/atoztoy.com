<!--== Start Header Wrapper ==-->
<header class="header-wrapper">

    {{-- =========================
         TOP HEADER
    ========================== --}}
    <div class="header-top">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-5 col-md-4 col-lg-6">

                    <div class="header-info-left">

                        <p>
                            Free Returns and Free Shipping
                        </p>

                    </div>

                </div>

                <div class="col-xs-12 col-sm-7 col-md-8 col-lg-6 sm-pl-0 xs-pl-15 header-top-right">

                    <div class="header-info">

                        <a href="tel:{{ $companyProfile->phone_no }}">
                            <i class="fa fa-phone"></i>
                           {{ $companyProfile->phone_no }}
                        </a>

                        <a href="mailto:{{ $companyProfile->email_address }}">
                            <i class="fa fa-envelope"></i>
                            {{ $companyProfile->email_address }}
                        </a>


                        {{-- CUSTOMER ACCOUNT --}}

                        @auth('customer')

                            <a href="{{ route('customer.account') }}">

                                <i class="fa fa-user"></i>

                                {{ auth('customer')->user()->name }}

                            </a>

                        @else

                            <a href="{{ route('customer.login') }}">

                                <i class="fa fa-user"></i>

                                Login / Register

                            </a>

                        @endauth

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
         MIDDLE HEADER
    ========================== --}}
    <div class="header-middle">

        <div class="container">

            <div class="row row-gutter-0 align-items-center">

                <div class="col-12">

                    <div class="header-align">


                        {{-- LOGO --}}

                        <div class="header-align-left">

                            <div class="header-logo-area">

                                <a href="{{ url('/') }}">
                                    @if($companyProfile && $companyProfile->logo_image)
                                    <img
                                        class="logo-main"
                                        src="{{ asset('storage/' . $companyProfile->logo_image) }}"
                                        alt="{{ $companyProfile->company_name }}"
                                    >
                                    @else

                                        <img
                                            class="logo-main"
                                            src="{{ asset('assets/images/logo.png') }}"
                                            alt="{{ $companyProfile->company_name ?? 'Company Logo' }}"
                                        >

                                        

                                    @endif
                                    
                                </a>

                            </div>

                        </div>


                        {{-- SEARCH --}}

                        <div class="header-align-center">

                            <div class="header-search-box">

                                <form
                                    action="{{ route('products.listing') }}"
                                    method="GET"
                                >

                                    <div class="form-input-item">

                                        <label
                                            for="search"
                                            class="sr-only"
                                        >
                                            Search Products
                                        </label>

                                        <input
                                            type="text"
                                            id="search"
                                            name="search"
                                            value="{{ request('search') }}"
                                            placeholder="Search Everything"
                                        >

                                        <button
                                            type="submit"
                                            class="btn-src"
                                        >

                                            <i class="pe-7s-search"></i>

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>


                        {{-- ACTIONS --}}

                        <div class="header-align-right">

                            <div class="header-action-area">


                                {{-- WISHLIST --}}

                                <div class="header-action-wishlist">

                                    <a
                                        href="#"
                                        class="btn-wishlist"
                                        title="Wishlist"
                                    >

                                        <i class="pe-7s-like"></i>

                                    </a>

                                </div>


                                {{-- CART --}}

                                <div class="header-action-cart">

                                    <a
                                        href="{{ route('cart.index') }}"
                                        class="btn-cart cart-icon"
                                        title="Shopping Cart"
                                    >

                                        <span class="cart-count">
                                            {{ $cartCount ?? 0 }}
                                        </span>

                                        <i class="pe-7s-shopbag"></i>

                                    </a>

                                </div>


                                <button
                                    class="btn-menu d-md-none"
                                    type="button"
                                >

                                    <i class="fa fa-bars"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
         MAIN NAVIGATION
    ========================== --}}
    <div class="header-area header-default sticky-header">

        <div class="container">

            <div class="row row-gutter-0 align-items-center">


                {{-- LOGO --}}

                <div class="col-4 col-sm-6 col-lg-2">

                    <div class="header-logo-area">

                        <a href="{{ route('products.index') }}">

                            <img
                                class="logo-main"
                                src="{{ asset('assets/images/logo.png') }}"
                                alt="AtoZ Toys"
                            >

                            <img
                                class="logo-light"
                                src="{{ asset('assets/images/logo.png') }}"
                                alt="AtoZ Toys"
                            >

                        </a>

                    </div>

                </div>


                {{-- NAVIGATION --}}

                <div class="col-lg-8 sticky-md-none">

                    <div class="header-navigation-area d-none d-md-block">

                        <ul class="main-menu nav position-relative">

                            <li>

                                <a
                                    class="{{ request()->routeIs('products.index') ? 'active' : '' }}"
                                    href="{{ url('/') }}"
                                >
                                    Home
                                </a>

                            </li>


                            <li>

                                <a href="{{ route('company_profile.aboutus') }}">
                                    About
                                </a>

                            </li>


                            {{-- SHOP --}}

                            <li >

                                <a href="{{ route('shop.categories.show') }}">
                                    Shop
                                </a>

                                {{-- You can later put categories here --}}

                            </li>


                            {{-- ACCOUNT --}}

                            <li class="has-submenu">

                                <a href="#">

                                    Account

                                </a>

                                <ul class="submenu-nav">

                                    @auth('customer')

                                        <li>
                                            <a href="{{ route('customer.account') }}">
                                                My Account
                                            </a>
                                        </li>

                                         <li>
                                            <a href="{{ route('customer.myorders') }}">
                                                My Orders
                                            </a>
                                        </li>

                                       <!-- <li>
                                            <a href="#">
                                                Wishlist
                                            </a>
                                        </li>

                                        <li>

                                            <form
                                                action="{{ route('customer.logout') }}"
                                                method="POST"
                                                style="display:inline;"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="dropdown-logout-btn"
                                                >
                                                    Logout
                                                </button>

                                            </form>

                                        </li> -->

                                    @else

                                        <li>
                                            <a href="{{ route('customer.login') }}">
                                                Login
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('customer.signup') }}">
                                                Create Account
                                            </a>
                                        </li>

                                    @endauth

                                </ul>

                            </li>


                            <li>

                                <a href="{{ route('contact-us') }}">
                                    Contact us
                                </a>

                            </li>

                        </ul>

                    </div>

                </div>


                {{-- RIGHT ACTIONS --}}

                <div class="col-8 col-sm-6 col-lg-2">

                    <div class="header-action-area">


                        {{-- SEARCH --}}

                        <div class="header-action-search">

                            <button
                                class="btn-search btn-search-menu"
                                type="button"
                            >

                                <i class="pe-7s-search"></i>

                            </button>

                        </div>


                        {{-- ACCOUNT --}}

                        <div class="header-action-login">

                            @auth('customer')

                                <a
                                    href="{{ route('customer.account') }}"
                                    class="btn-login"
                                    title="My Account"
                                >

                                    <i class="pe-7s-users"></i>

                                </a>

                            @else

                                <a
                                    href="{{ route('customer.login') }}"
                                    class="btn-login"
                                    title="Login"
                                >

                                    <i class="pe-7s-users"></i>

                                </a>

                            @endauth

                        </div>


                        {{-- WISHLIST --}}

                        <div class="header-action-wishlist">

                            <a
                                href="#"
                                class="btn-wishlist"
                                title="Wishlist"
                            >

                                <i class="pe-7s-like"></i>

                            </a>

                        </div>


                        {{-- CART --}}

                        <div class="header-action-cart">

                            <a
                                href="{{ route('cart.index') }}"
                                class="btn-cart cart-icon"
                                title="Shopping Cart"
                            >

                                <span class="cart-count">

                                    {{ $cartCount ?? 0 }}

                                </span>

                                <i class="pe-7s-shopbag"></i>

                            </a>

                        </div>


                        {{-- MOBILE MENU --}}

                        <button
                            class="btn-menu d-lg-none"
                            type="button"
                        >

                            <i class="fa fa-bars"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</header>
<!--== End Header Wrapper ==-->
