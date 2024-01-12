<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Best Online Income Source in Bangladesh">

    <!-- ========== Page Title ========== -->
    @yield('meta')

    <title>Best Online Income Source in Bangladesh</title>

    <!-- ========== Favicon Icon ========== -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/assets/frontend/img/favicon.ico') }}">

    <!-- ========== Start Stylesheet ========== -->
    {!! Html::style('/assets/frontend/css/bootstrap.min.css') !!}
    {!! Html::style('/assets/frontend/css/font-awesome.min.css') !!}
    {!! Html::style('/assets/frontend/css/flaticon-set.css') !!}
    {!! Html::style('/assets/frontend/css/elegant-icons.css') !!}
    {!! Html::style('/assets/frontend/css/magnific-popup.css') !!}
    {!! Html::style('/assets/frontend/css/owl.carousel.min.css') !!}
    {!! Html::style('/assets/frontend/css/owl.theme.default.min.css') !!}
    {!! Html::style('/assets/frontend/css/animate.css') !!}
    {!! Html::style('/assets/frontend/css/bootsnav.css') !!}
    {!! Html::style('/assets/frontend/css/style.css') !!}
    {!! Html::style('/assets/frontend/css/responsive.css') !!}

    @yield('header-css')
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    {!! Html::script('/assets/frontend/js/html5/html5shiv.min.js') !!}
    {!! Html::script('/assets/frontend/js/html5/respond.min.js') !!}
<![endif]-->

<!-- ========== Google Fonts ========== -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,500,600,700,800" rel="stylesheet">

</head>

<body>

<!-- Preloader Start -->
<div class="se-pre-con"></div>
<!-- Preloader Ends -->

<!-- Start Header Top
============================================= -->
{{--@include('frontend.includes.header-top')--}}
<!-- End Header Top -->

<!-- Header
============================================= -->
@include('frontend.includes.header')
<!-- End Header -->

@yield('content')

<!-- Start Footer
============================================= -->
@include('frontend.includes.footer')
<!-- End Footer -->

<!-- jQuery Frameworks
============================================= -->
{!! Html::script('/assets/frontend/js/jquery-1.12.4.min.js') !!}
{!! Html::script('/assets/frontend/js/bootstrap.min.js') !!}
{!! Html::script('/assets/frontend/js/equal-height.min.js') !!}
{!! Html::script('/assets/frontend/js/jquery.appear.js') !!}
{!! Html::script('/assets/frontend/js/jquery.easing.min.js') !!}
{!! Html::script('/assets/frontend/js/jquery.magnific-popup.min.js') !!}
{!! Html::script('/assets/frontend/js/modernizr.custom.13711.js') !!}
{!! Html::script('/assets/frontend/js/owl.carousel.min.js') !!}
{!! Html::script('/assets/frontend/js/wow.min.js') !!}
{!! Html::script('/assets/frontend/js/isotope.pkgd.min.js') !!}
{!! Html::script('/assets/frontend/js/imagesloaded.pkgd.min.js') !!}
{!! Html::script('/assets/frontend/js/count-to.js') !!}
{!! Html::script('/assets/frontend/js/YTPlayer.min.js') !!}
{!! Html::script('/assets/frontend/js/jquery.nice-select.min.js') !!}
{!! Html::script('/assets/frontend/js/bootsnav.js') !!}
{!! Html::script('/assets/frontend/js/main.js') !!}
{!! Html::script('/assets/frontend/js/jquery.lazyload.min.js') !!}
@yield('footer-script')
</body>
</html>
