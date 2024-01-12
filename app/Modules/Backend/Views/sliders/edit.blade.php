@extends('backend.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-edit"></i> Edit Slider</h5>
            </div>
        </div>
        {!! Form::open(['route'=>array('admin.sliders.update',\App\Libraries\Encryption::encodeId($slider->id)), 'method'=>'patch','enctype'=>'multipart/form-data','id'=>'dataForm']) !!}
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',$slider->name,['class'=>$errors->has('name')?'form-control is-invalid':'form-control','placeholder'=>'Name']) !!}
                </div>
                <div class="col-md-12 form-group">
                    {!! Form::label('title','Title') !!}
                    {!! Form::text('title',$slider->title,['class'=>$errors->has('title')?'form-control is-invalid':'form-control','placeholder'=>'Title']) !!}
                </div>
                <div class="col-md-12 form-group">
                    {!! Form::label('Description','Description') !!}
                    {!! Form::text('description',$slider->description,['class'=>$errors->has('description')?'form-control is-invalid':'form-control','rows'=>'5','id' => 'description','placeholder'=>'Description']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('status','Status',['class'=>'font-weight-bold required-star']) !!}
                    {!! Form::select('status',[1=>'Active',0=>'Inactive'],$slider->status,['class'=>$errors->has('status')?'form-control is-invalid':'form-control required']) !!}
                </div>
                <div class="col-md-6 form-group">
                    {!! Form::label('ordering','Ordering',['class'=>'font-weight-bold']) !!}
                    {!! Form::number('ordering',$slider->ordering,['class'=>$errors->has('ordering')?'form-control is-invalid':'form-control required']) !!}
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{ Form::label('image', 'Image :',['class'=>'required-star']) }}
                        <br/>
                        <div>
                            <img style="width:120px;height:100px" class="img img-thumbnail" src="{{ url('/uploads/sliders/'.$slider->image)}}" id="photoViewer">
                        </div>
                        <label class="btn btn-block btn-secondary btn-sm border-0" style="width: 120px;">
                        <input style="width: 120px;min-height:30px;visibility: hidden;position: absolute;" {{ !($slider->image) ? 'required' : '' }}  onchange="changePhoto(this)" type="file" name="image">
                            <i class="fa fa-image"></i> Browse
                        </label>
                        <span id="photo_err" class="text-danger" style="font-size: 16px;"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
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
