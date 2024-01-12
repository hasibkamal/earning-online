@extends('backend.layouts.app')
@section('content')
    <ol class="breadcrumb alert alert-info p-2">
        <li class="breadcrumb-item"><strong>Created At - </strong> <span>{{ \Carbon\Carbon::parse($plan->created_at)->format('d F , Y') }} at {{ \Carbon\Carbon::parse($plan->created_at)->format('g:i A') }} </span></li>
    </ol>
    <div class="card">
        <div class="card-header">
            <div class="row col-sm">
                <h5><i class="fa fa-list-alt"></i> Plan details</h5>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Name </div>
                        <div class="col-lg-8"> {{ $plan->name }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Price </div>
                        <div class="col-lg-8"> {{ $plan->price }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Days </div>
                        <div class="col-lg-8"> {{ $plan->expiry_days }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Limit </div>
                        <div class="col-lg-8"> {{ $plan->daily_limit }} </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-4 font-weight-bold"> Status </div>
                        <div class="col-lg-8">
                            @if($plan->status == 1)
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
            <a href="{{ route('admin.plans.index') }}" class="btn btn-secondary"><i class="fa fa-backward"></i> Back</a>
        </div>
    </div>
@endsection
