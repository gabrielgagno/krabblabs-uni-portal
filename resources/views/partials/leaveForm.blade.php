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
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </form>
@endsection