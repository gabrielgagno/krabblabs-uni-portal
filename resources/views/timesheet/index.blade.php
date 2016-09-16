@extends('layouts.app')
@include('layouts.sidebar')
@section('linkrels')
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/dataTables.bootstrap.min.css')}}"/>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Attendance
                    </div>

                    <div class="panel-body table-responsive">
                        <div class="row">
                            <div class="pull-right">
                                <div class="form-group">
                                    <div class="col-md-4"><label for="myMin">Date From: </label></div>
                                    <div class="col-md-8"><input type="text" id="myMin" name="min" class="form-control" /></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4"><label for="myMax">Date To: </label></div>
                                    <div class="col-md-8"><input type="text" id="myMax" name="min" class="form-control"></div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/vendor/moment/moment.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $.fn.dataTable.ext.search.push(
                    function( settings, data, dataIndex ) {
                        var min = $('#myMin').val();
                        var max = $('#myMax').val();
                        if(min=='' || max=='') {
                            return true;
                        }
                        console.log('putangina ito ba');
                        var date = moment(data[0], 'YYYY/MM/DD');
                        console.log(data[0]);
                        return date.isBetween(moment(min, 'YYYY/MM/DD'), moment(max, 'YYYY/MM/DD'), null, '[]');
                    }
            );

            var attendanceTable = $('#myAttendanceTable').DataTable({
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

            $('#myMin, #myMax').keyup( function() {
                attendanceTable.draw();
            } );
        })
    </script>
@endsection