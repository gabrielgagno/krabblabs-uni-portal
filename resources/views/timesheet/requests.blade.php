@extends('layouts.app')
@include('layouts.sidebar')

@section('content')
    <div class="container">
        <h1 class="h1 page-header">Requests</h1>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#leave" data-toggle="tab">Leave</a></li>
                <li><a href="#timecorrection" data-toggle="tab">Time Correction</a></li>
                <li><a href="#overtime" data-toggle="tab">Overtime</a></li>
            </ul>
            <div class="tab-content" id="tabs">
                <div class="tab-pane fade active in" id="leave">...Content...</div>
                <div class="tab-pane" id="timecorrection">...Content...</div>
                <div class="tab-pane" id="overtime">...Content...</div>
            </div>
        </div>
    </div>
@endsection