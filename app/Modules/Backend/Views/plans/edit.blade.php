@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-edit"></i> Edit Plan</h5>
            </div>
        </div>
        {!! Form::open(['route'=>array('admin.plans.update',\App\Libraries\Encryption::encodeId($plan->id)), 'method'=>'patch','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    {!! Form::label('name','Name',['class'=>'required-star']) !!}
                    {!! Form::text('name',$plan->name,['class'=>$errors->has('name')?'form-control is-invalid':'form-control required','placeholder'=>'Name']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('price','Price',['class'=>'font-weight-bold']) !!}
                    {!! Form::number('price',$plan->price,['class'=>$errors->has('price')?'form-control is-invalid':'form-control required']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('expiry_days','Days',['class'=>'font-weight-bold']) !!}
                    {!! Form::number('expiry_days',$plan->expiry_days,['class'=>$errors->has('expiry_days')?'form-control is-invalid':'form-control required']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('daily_limit','Limit',['class'=>'font-weight-bold']) !!}
                    {!! Form::number('daily_limit',$plan->daily_limit,['class'=>$errors->has('daily_limit')?'form-control is-invalid':'form-control required']) !!}
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.plans.index') }}" class="btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
            <button type="submit" class="btn float-right btn-primary"><i class="fa fa-save"></i> Update</button>
        </div>
        {!! Form::close() !!}
    </div><!--card-->
@endsection
@section('footer-script')
{!! Html::script('assets/backend/plugins/tinymce/tinymce.min.js') !!}
{!! Html::script('assets/backend/plugins/tinymce/tinymce.js') !!}>
    <script type="text/javascript">
        $(document).ready(function () {
            /**********************
             VALIDATION START HERE
             **********************/
            $('#dataForm').validate({
                errorPlacement: function () {
                    return false;
                }
            });
        });
    </script>
@endsection
