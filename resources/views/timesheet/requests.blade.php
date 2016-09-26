@extends('layouts.app')
@include('partials.leaveForm')
@section('linkrels')
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/datepicker/bootstrap-datetimepicker.min.css')}}" />
    <link rel='stylesheet' href="{{asset('/vendor/fullcalendar/fullcalendar.min.css')}}" />
    <style>
        textarea {
            resize: none;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="h1 page-header">Requests</h1>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <h4>Leave Balance</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Vacation Leaves</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Sick Leaves</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Other Leaves</h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <h4>Excess Time</h4>
                </div>
            </div>
            <div class="row col-md-12">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#leave" data-toggle="tab">Leave</a></li>
                    <li><a href="#timecorrection" data-toggle="tab">Time Correction</a></li>
                    <li><a href="#overtime" data-toggle="tab">Overtime</a></li>
                </ul>
                <div class="tab-content" id="tabs">
                    <div class="tab-pane fade active in" id="leave">
                        @yield('leaveForm')
                    </div>
                    <div class="tab-pane" id="timecorrection">

                    </div>
                    <div class="tab-pane" id="overtime">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('/vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('/vendor/fullcalendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('/js/leavesPicker.js')}}"></script>
@endsection