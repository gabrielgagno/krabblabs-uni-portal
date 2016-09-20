<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class TimesheetController extends Controller
{
    // non-standard non-resource views
    public function attendanceView()
    {
        return view('timesheet.index');
    }

    // non-standard non-resource methods

    // resource methods
}
