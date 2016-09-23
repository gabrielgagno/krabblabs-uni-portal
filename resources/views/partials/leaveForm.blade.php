@section('leaveForm')
    <form method="post" action="{{url('/attendances/leaves')}}">
        <div class="form-group">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="col-lg-3">
                        <label for="leaveType">Leave Type:</label>
                    </div>
                    <div class="col-lg-9">
                        <select id="leaveType" name="leaveType" class="form-control">
                            <option value="0">Sick Leave</option>
                            <option value="1">Vacation Leave</option>
                            <option value="2">Maternity Leave</option>
                            <option value="4">Paternity Leave</option>
                            <option value="5">Bereavement Leave</option>
                            <option value="6">Leave without Pay</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="input-group date" id="dateFrom">
                            <input type='text' name="dateFrom" id="from" class="form-control" placeholder="Date From"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group date" id="dateTo">
                            <input type='text' name="dateTo" id="to" class="form-control" placeholder="Date To" />
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </form>
@endsection