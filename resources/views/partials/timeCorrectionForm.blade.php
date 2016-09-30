@section('timeCorrectionForm')
    <form method="post" action="{{url('/timesheet/requests/time-corrections')}}">
        <div class="row">
            <div class="col-md-6">
                <br />
                <div class="form-group">
                    <div class="col-md-3">
                        <label for="dateCorrect">Correction Date:</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <div class="input-group date" id="dateCorrection">
                                <input type='text' id="dateCorrect" name="dateCorrect" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <label for="dateCorrect">New Time In:</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <div class="input-group date" id="dateCorrectionNewIn">
                                <input type='text' id="dateCorrectNewIn" name="dateCorrectNewIn" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        <label for="dateCorrect">New Time Out:</label>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <div class="input-group date" id="dateCorrectionNewOut">
                                <input type='text' id="dateCorrectNewOut" name="dateCorrectNewOut" class="form-control" placeholder="Date From"/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <br />
                <div class="row">
                    <div class="col-md-3">
                        <label for="timeCorrectApprover">Approver: </label>
                    </div>
                    <div class="col-md-9">
                        <select id="timeCorrectApprover" name="timeCorrectApprover" class="form-control">
                            <option value="1">Jaime Samaniego</option>
                        </select>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-3">
                        <label for="timeCorrectReason">Reason: </label>
                    </div>
                    <div class="col-md-9">
                        <textarea id="timeCorrectReason" name="timeCorrectReason" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection