@extends('frontend.layouts.app')
@section('content')
    <!-- Start Contact Area
    ============================================= -->
    <div class="contact-area text-center default-padding">
        <div class="container">
            <div class="row">
                <div class="contact-items">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Get in touch with us</h2>
                        <p>{{ config('misc.contact_us.short_description') }}</p>
                        <div class="col-md-12">
                            @include('frontend.includes.messages')
                        </div>
                        {!! Form::open(['route'=>array('contact.store'), 'method'=>'post','id'=>'dataForm']) !!}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group">
                                    {!! Form::text('name','',['class'=>$errors->has('name')?'form-control is-invalid':'form-control required','placeholder'=>'Write name']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::email('email','',['class'=>$errors->has('email')?'form-control is-invalid':'form-control required','placeholder'=>'Write email']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::text('phone','',['class'=>$errors->has('phone')?'form-control is-invalid':'form-control required','placeholder'=>'Write phone']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group comments">
                                    {!! Form::textarea('message','',['class'=>$errors->has('message')?'form-control is-invalid':'form-control required','placeholder'=>'Write description','rows'=>4]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <button type="submit">Send Message <i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->

    <!-- Start Contact Top Entry
============================================= -->
    <div class="top-entry-area bg-gray text-center">
        <div class="container">
            <div class="row">
                <div class="item-box">
                    <!-- Single Item -->
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <i class="fas fa-map-marked-alt"></i>
                            <h4>Location</h4>
                            <p>{{ session()->get('company.company_address') }}</p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <i class="fas fa-phone"></i>
                            <h4>Emergency Case</h4>
                            <h2>{{ session()->get('company.company_phone') }}</h2>
                        </div>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 single-item">
                        <div class="item">
                            <i class="fas fa-envelope-open"></i>
                            <h4>Email</h4>
                            <p>{{ session()->get('company.company_email') }}</p>
                        </div>
                    </div>
                    <!-- End Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Top Entry -->

    <!-- Start Google Maps
    ============================================= -->
{{--    <div class="maps-area">--}}
{{--        <div class="container-full">--}}
{{--            <div class="row">--}}
{{--                <div class="google-maps">--}}
{{--                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- End Google Maps -->
@endsection
