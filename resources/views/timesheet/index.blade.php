@extends('layouts.app')
@include('layouts.sidebar')
@section('linkrels')
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/datatables.min.css')}}"/>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">My Attendance</div>

                    <div class="panel-body table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Date From:</td>
                                    <td><input type="text" id="min" name="min" class=""></td>
                                </tr>
                                <tr>
                                    <td>Date To:</td>
                                    <td><input type="text" id="max" name="min"></td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="myAttendanceTable" class="table">
                            <thead>
                                <th>Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Expected Hours</th>
                                <th>Actual Hours</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Team Attendance</div>

                    <div class="panel-body">
                        <table id="projectAttendanceTable" class="table">
                            <thead>
                            <th>Employee No.</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Expected Hours</th>
                            <th>Actual Hours</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Search for an Employee's Attendance</div>

                    <div class="panel-body">
                        <table id="allAttendanceTable" class="table">
                            <thead>
                            <th>Employee No.</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#myAttendanceTable').DataTable({
                "ordering": false,
                "ajax" : "{{ url('/api/v1/timesheet/'.Auth::user()->id).'?data=true' }}",
                "columns" : [
                    { data: 'date' },
                    { data: 'timeIn'},
                    { data: 'timeOut' },
                    { render: function() {
                        return 9;
                    } },
                    { data: 'actualHours' }
                ]
            });
        })
    </script>
@endsection