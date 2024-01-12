@extends('backend.layouts.app')
@section('content')
    <ol class="breadcrumb alert alert-info p-2">
        <li class="breadcrumb-item"><strong>Created At - </strong> <span>{{ \Carbon\Carbon::parse($gallery->created_at)->format('d F , Y') }} at {{ \Carbon\Carbon::parse($gallery->created_at)->format('g:i A') }} </span></li>
    </ol>
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-list-alt"></i> Gallery details</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Title </div>
                        <div class="col-lg-8"> {{ $gallery->title }} </div>
                    </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Status </div>
                        <div class="col-lg-8">
                            @if($gallery->status == 1)
                            <label class='badge badge-success'>Active</label>
                            @else
                              <label class='badge badge-danger'> Inactive</label>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div>
@endsection
