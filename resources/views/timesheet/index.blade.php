@extends('layouts.app')
@include('layouts.sidebar')
@section('linkrels')
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/datatables/dataTables.bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/vendor/datepicker/bootstrap-datetimepicker.min.css')}}" />
@endsection
@section('content')
    <div class="container">
        <h1 class="h1 page-header">Attendance</h1>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        My Attendance ({{Auth::user()->employeeNumber.': '.Auth::user()->lastName.', '.Auth::user()->firstName.' '.Auth::user()->middleName}})
                    </div>

                    <div class="panel-body table-responsive">
                        <div class="row pull-right">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <div class="input-group date" id="myDateFrom">
                                        <input type='text' id="myMin" class="form-control" placeholder="Date From"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group date" id="myDateTo">
                                        <input type='text' id="myMax" class="form-control" placeholder="Date To" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <button id="today" class="btn btn-disabled" disabled>Today</button>
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
    <script src="{{asset('/vendor/datepicker/bootstrap-datetimepicker.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            // datatables date range
            $.fn.dataTable.ext.search.push(
                    function( settings, data, dataIndex ) {
                        var min = $('#myMin').val();
                        var max = $('#myMax').val();
                        if(min=='' || max=='') {
                            return true;
                        }
                        var date = moment(data[0], 'YYYY/MM/DD');
                        return date.isBetween(moment(min, 'YYYY/MM/DD'), moment(max, 'YYYY/MM/DD'), null, '[]');
                    }
            );
            // init for my attendance table
            var myAttendanceTable = $('#myAttendanceTable').DataTable({
                "dom": '<l><t><ip>',
                "ordering": false,
                "ajax": {
                    url: "{{url('/api/v1/attendances/'.Auth::user()->id)}}",
                    dataSrc: 'result'
                },
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

            myAttendanceTable.column(0).search(moment().format('YYYY-MM-DD'));

            // init for date picker
            $(function () {
                $('#myDateFrom').datetimepicker({
                    'format': 'YYYY/MM/DD'
                });
            }).on('dp.change', function () {
                $('#today').prop('disabled', false).attr('class', 'btn btn-success');

                myAttendanceTable.columns().search("").draw();
            });
            $(function () {
                $('#myDateTo').datetimepicker({
                    'format': 'YYYY/MM/DD'
                });
            }).on('dp.change', function () {
                $('#today').prop('disabled', false).attr('class', 'btn btn-success');
                myAttendanceTable.columns().search("").draw();
            });

            // today button
            $('#today').click(function () {
                $('#myMin').val('');
                $('#myMax').val('');
                myAttendanceTable.column(0).search(moment().format('YYYY-MM-DD')).draw();
                $('#today').prop('disabled', true).attr('class', 'btn btn-disabled');
            })
        });

    </script>
@endsection