@extends('frontend.layouts.app')
@section('content')
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
@endsection
