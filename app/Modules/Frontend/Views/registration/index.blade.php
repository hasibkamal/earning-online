@extends('frontend.layouts.app')
@section('content')
<!-- Start Plan
============================================= -->
<div class="services-area inc-icon default-padding bottom-less">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="site-heading text-center">
                    <h2>Let's Signup & <span>Start</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card">
                {!! Form::open(['route'=>'registration.store', 'method'=>'post','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('backend.includes.messages')
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::label('name','Name',['class'=>'required-star']) !!}
                            {!! Form::text('name','',['class'=>$errors->has('name')?'form-control is-invalid':'form-control required','placeholder'=>'Name']) !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::label('email','Email',['class'=>'font-weight-bold']) !!}
                            {!! Form::email('email','',['class'=>$errors->has('email')?'form-control is-invalid':'form-control required','placeholder'=>'Email Address']) !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::label('mobile','Mobile',['class'=>'font-weight-bold']) !!}
                            {!! Form::text('mobile','',['class'=>$errors->has('mobile')?'form-control is-invalid':'form-control required','placeholder'=>'Mobile']) !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::label('username','Username',['class'=>'font-weight-bold']) !!}
                            {!! Form::text('username','',['class'=>$errors->has('username')?'form-control is-invalid':'form-control required','placeholder'=>'username']) !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::label('password','Password',['class'=>'font-weight-bold']) !!}
                            {!! Form::password('password',['class'=>$errors->has('password')?'form-control is-invalid':'form-control required']) !!}
                        </div>
                        <div class="col-md-6 form-group">
                            {!! Form::label('password_confirmation','Re-type Password',['class'=>'font-weight-bold']) !!}
                            {!! Form::password('password_confirmation',['class'=>$errors->has('password_confirmation')?'form-control is-invalid':'form-control required']) !!}
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn pull-right btn-primary"><i class="fa fa-save"></i> Register</button>
                </div>
                {!! Form::close() !!}
            </div><!--card-->
        </div>
        <div style="margin-top: 100px;"></div>
    </div>
</div>
<!-- End Plan -->
@endsection
