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

    public function logTime(Request $request, $id)
    {
        $user = User::find($id);
        if($user->attendances->where('date', '=', date('Y-m-d'))->first()) {
            // update
            return "huu";
        }
        // create new or check if there's
        return 'haha';
    }
}
