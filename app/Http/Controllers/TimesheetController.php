<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class TimesheetController extends Controller
{
    //

    public function index()
    {
        return view('timesheet.index');
    }
}
