@extends('layouts.app')
@include('layouts.sidebar')

@section('content')
    <div class="container">
        <h1 class="h1 page-header">Requests</h1>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#leave" data-toggle="tab">Leave</a></li>
                    <li><a href="#timecorrection" data-toggle="tab">Time Correction</a></li>
                    <li><a href="#overtime" data-toggle="tab">Overtime</a></li>
                </ul>
                <div class="tab-content" id="tabs">
                    <div class="tab-pane fade active in" id="leave">
                        <form method="post" action="{{url('/requests/leaves/')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                
                            </div>
                        </form>
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