<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TimesheetController extends Controller
{
    //

    public function index()
    {
        return view('timesheet.index');
    }
}
