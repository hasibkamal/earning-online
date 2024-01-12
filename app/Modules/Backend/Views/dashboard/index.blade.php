@extends('backend.layouts.app')
@section('header-css')
    {!! Html::style('assets/backend/dist/css/dataTables.bootstrap4.min.css') !!}
    {!! Html::style('assets/backend/dist/css/buttons.dataTables.min.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5><i class="fa fa-chart-bar"></i> Appointment Statistics</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1">
                            <i class="fas fa-calendar-day text-white"></i>
                        </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Today</span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1">
                            <i class="fas fa-calendar-check text-white"></i>
                        </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Current Month</span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box mb-3">
                        <span class="info-box-icon bg-secondary elevation-1">
                            <i class="fas fa-calendar text-white"></i>
                        </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Current Year</span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1">
                            <i class="fas fa-check text-white"></i>
                        </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total</span>
                                    <span class="info-box-number">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
