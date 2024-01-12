@extends('login.layouts.app')
@section('title') Login @endsection
@section('content')
    <!-- Start Login
           ============================================= -->
    <div class="reg-area" >
        <div class="container">
            <div class="reg-wpr">
                <div class="login-form">
                    <div class="login-up mb-50">
                        <h2 class="register-title mb-20 text-center">Welcome</h2>
                        <h6 class="register-sub-title text-center">Sign in to your account to continue</h6>
                    </div>
                    {!! Form::open(['url'=>'login','method'=>'post','class'=>'row g-0']) !!}
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('email','User ID ',['class'=>'required-star']) !!}
                        {!! Form::email('email','',['class'=>'input-style-2 form-control','placeholder'=>'Enter your email']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Form::label('password','Password',['class'=>'required-star']) !!}
                        {!! Form::password('password',['class'=>'form-control input-style-2','placeholder'=>'******']) !!}
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        <a href="#" class="rs-ps"><span>Reset Password</span></a>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" name="remember_me" type="checkbox" value="1" id="flexCheckDefault">--}}
{{--                            <label class="form-check-label" for="flexCheckDefault">--}}
{{--                                Remember Me Next Time--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-12 mt-2">
                        <div class="login-btns">
                            {!! Form::submit(' Login',['class'=>'btn-3 w-100']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->
@endsection
