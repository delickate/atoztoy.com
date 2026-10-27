<!DOCTYPE html>
<html lang="zxx" class=" video no-touchevents csstransitions no-videoautoplay">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>A to Z Toys</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <!--== Google Fonts ==-->
   <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
   <!--== Bootstrap CSS ==-->
    <link href="{{ asset('assets/images/bootstrap.min.css') }}" rel="stylesheet">
    <!--== Font-awesome Icons CSS ==-->
    <link href="{{ asset('assets/images/font-awesome.min.css') }}" rel="stylesheet">
    <!--== Pe Icon 7 Min Icons CSS ==-->
    <link href="{{ asset('assets/images/pe-icon-7-stroke.min.css') }}" rel="stylesheet">
    <!--== Ionicons CSS ==-->
    <link href="{{ asset('assets/css/ionicons.min.css') }}" rel="stylesheet">
    <!--== Animate CSS ==-->
    <link href="{{ asset('assets/images/animate.css') }}" rel="stylesheet">
    <!--== Aos CSS ==-->
    <link href="{{ asset('assets/images/aos.css') }}" rel="stylesheet">
    <!--== FancyBox CSS ==-->
    <link href="{{ asset('assets/images/jquery.fancybox.min.css') }}" rel="stylesheet">
    <!--== Slicknav CSS ==-->
    <link href="{{ asset('assets/images/slicknav.css') }}" rel="stylesheet">
    <!--== Swiper CSS ==-->
    <link href="{{ asset('assets/images/swiper.min.css') }}" rel="stylesheet">
    <!--== Slick CSS ==-->
    <link href="{{ asset('assets/images/slick.css') }}" rel="stylesheet">
    <!--== Main Style CSS ==-->
    <link href="{{ asset('assets/images/style.css') }}" rel="stylesheet">
    

    

</head>

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0" class="preloader-deactive">

<!--wrapper start-->
<div class="wrapper home-default-wrapper">

  <!--== Start Preloader Content ==-->
  <div class="preloader-wrap">
    <div class="preloader">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!--== End Preloader Content ==-->
    @include('partials-frontend.headers')

          <!--begin::Container-->
          @yield('content')
    
    @include('partials-frontend.fooer')
</div> 
<!--=======================Javascript============================-->
<!--=== Modernizr Min Js ===-->

<!--=== jQuery Min Js ===-->
<script src="{{ asset('assets/js/jquery-main.js') }}"></script>
<!--=== jQuery Migration Min Js ===-->
<script src="{{ asset('assets/js/jquery-migrate.js') }}"></script>
<!--=== Popper Min Js ===-->
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<!--=== Bootstrap Min Js ===-->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!--=== jquery Appear Js ===-->
<script src="{{ asset('assets/js/jquery.appear.js') }}"></script>
<!--=== jquery Swiper Min Js ===-->
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<!--=== jquery Fancybox Min Js ===-->
<script src="{{ asset('assets/js/fancybox.min.js') }}"></script>
<!--=== jquery Aos Min Js ===-->
<script src="{{ asset('assets/js/aos.min.js') }}"></script>
<!--=== jquery Slicknav Js ===-->
<script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
<!--=== jquery Countdown Js ===-->
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<!--=== jquery Tippy Js ===-->
<script src="{{ asset('assets/js/tippy.all.min.js') }}"></script>
<!--=== Isotope Min Js ===-->
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<!--=== Parallax Min Js ===-->
<script src="{{ asset('assets/js/parallax.min.js') }}"></script>
<!--=== Slick  Min Js ===-->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!--=== jquery Wow Min Js ===-->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!--=== jquery Zoom Min Js ===-->
<script src="{{ asset('assets/js/jquery-zoom.min.js') }}"></script>

<!--=== Custom Js ===-->
<script src="{{ asset('assets/js/custom.js') }}"></script>


    </body>
</html>


