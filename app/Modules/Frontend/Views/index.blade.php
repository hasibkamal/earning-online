@extends('frontend.layouts.app')
@section('header-css')
<style type="text/css">
img .lazy-load{
    background-color: grey;

}
</style>
@endsection
@section('content')
<!-- Start Banner
============================================= -->
<div class="banner-area heading-exchange text-dark">
    <div id="bootcarousel" class="carousel inc-top-heading slide carousel-fade animate_text" data-ride="carousel">
        @if(count($sliders)>0)
        <!-- Wrapper for slides -->
        <div class="carousel-inner carousel-zoom">
            @foreach($sliders as $index => $slider)
            <div class="item @if(!$index) active @endif">
{{--                <div class="slider-thumb bg-cover" style="background-image: url({{ url('/uploads/sliders/'.$slider->image) }});"></div>--}}
                <img class="slider-thumb bg-cover lazy-load" src="{{ url('/uploads/sliders/'.$slider->image) }}" />
                <div class="box-table">
                    <div class="box-cell">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content">
                                        <br/>
                                        <h1 data-animation="animated fadeInUp"><span>{{ $slider->name }}</span></h1>
                                        <h2 style="color: #FFFFFF; font-weight: bold" data-animation="animated fadeInDown">{{ $slider->title }}</h2>
                                        <p data-animation="animated slideInUp">
                                            {!! $slider->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End Wrapper for slides -->

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#bootcarousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
        @endif
    </div>
</div>
<!-- End Banner -->


<!-- Start Plan
============================================= -->
<div class="services-area inc-icon default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h2>Our <span>Plans</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="services-items text-center">
                @foreach($plans as $plan)
                <!-- Single Item -->
                <div class="col-md-4 col-sm-6 equal-height">
                    <div class="item">
                        <div class="info">
                            <h4>
                                <a href="#">{{ $plan->name }}</a>
                            </h4>
                            <h5>
                                <a href="#">Price : {{ $plan->price }} tk.</a>
                            </h5>
                            <h5>
                                <a href="#">Days : {{ $plan->expiry_days }}</a>
                            </h5>
                            <h5>
                                <a href="#">Daily Ads : {{ $plan->daily_limit }}</a>
                            </h5>

                            <h4>
                                <a class="btn btn-primary">Purchase</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- End Single Item -->
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Plan -->

<!-- Start Gallery
============================================= -->
<div class="gallery-area default-padding">
    <div class="container">
        <div class="gallery-items-area text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="site-heading text-center">
                        <h2>Our <span>Gallery</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 gallery-content">
                    <div class="row magnific-mix-gallery text-center masonary">
                        <div id="portfolio-grid" class="gallery-items col-4">
                            <!-- Single Item -->
                            @foreach($gallery as $photo)
                                <div class="pf-item">
                                    <div class="effect-box">
                                        <img class="lazy-load" width="300" height="250" data-original="{{ url('/uploads/gallery/'.$photo->image) }}" alt="thumb">
                                        <div class="info">
                                            <h4><a href="#">{{ $photo->title }}</a></h4>
                                            <a href="{{ url('/uploads/gallery/'.$photo->image) }}" class="item popup-link"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Gallery -->
@endsection
@section('footer-script')
<script>
    $(document).ready(function(){
        $('img').lazyload();
    });
</script>
@endsection
