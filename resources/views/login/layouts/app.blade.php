<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','Login Layout')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/login/img/logo/favicon.png') }}">
    <!-- ========== Start Stylesheet ========== -->
    {!! Html::style('/assets/login/css/bootstrap.min.css') !!}
    {!! Html::style('/assets/login/css/fontawesome.min.css') !!}
    {!! Html::style('/assets/login/css/magnific-popup.css') !!}
    {!! Html::style('/assets/login/css/owl.carousel.min.css') !!}
    {!! Html::style('/assets/login/css/owl.theme.default.min.css') !!}
    {!! Html::style('/assets/login/css/animate.css') !!}
    {!! Html::style('/assets/login/css/themify-icons.css') !!}
    {!! Html::style('/assets/login/css/icofont.min.css') !!}
    {!! Html::style('/assets/login/css/site-flaticon.css') !!}
    {!! Html::style('/assets/login/style.css') !!}
    {!! Html::style('/assets/login/css/responsive.css') !!}
    {!! Html::style('/assets/backend/dist/css/custom.css') !!}
    <!-- ========== End Stylesheet ========== -->
</head>

<body id="bdy" class="bg">

<main class="main">
    @yield('content')
</main>

<!-- Start Scroll top
============================================= -->
<a href="#bdy" id="scrtop" class="smooth-menu"><i class="ti-arrow-up"></i></a>
<!-- End Scroll top-->

<!-- jQuery Frameworks
============================================= -->
{!! Html::script('/assets/login/js/jquery-3.6.0.min.js') !!}
{!! Html::script('/assets/login/js/popper.min.js') !!}
{!! Html::script('/assets/login/js/bootstrap.min.js') !!}
{!! Html::script('/assets/login/js/jquery.easing.min.js') !!}
{!! Html::script('/assets/login/js/jquery.appear.js') !!}
{!! Html::script('/assets/login/js/modernizr.custom.13711.js') !!}
{!! Html::script('/assets/login/js/owl.carousel.min.js') !!}
{!! Html::script('/assets/login/js/jquery.magnific-popup.min.js') !!}
{!! Html::script('/assets/login/js/imagesloaded.pkgd.min.js') !!}
{!! Html::script('/assets/login/js/isotope.pkgd.min.js') !!}
{!! Html::script('/assets/login/js/wow.min.js') !!}
{!! Html::script('/assets/login/js/wodry.min.js') !!}
{!! Html::script('/assets/login/js/count-to.js') !!}
{!! Html::script('/assets/login/js/progress-bar.min.js') !!}
{!! Html::script('/assets/login/js/color-option.js') !!}
{!! Html::script('/assets/login/js/typed.js') !!}
{!! Html::script('/assets/login/js/YTPlayer.min.js') !!}
{!! Html::script('/assets/login/js/jquery.mixitup.min.js') !!}
{!! Html::script('/assets/login/js/active-class.js') !!}
{!! Html::script('/assets/login/js/jquery.countdown.min.js') !!}
{!! Html::script('/assets/login/js/main.js') !!}

</body>

</html>
