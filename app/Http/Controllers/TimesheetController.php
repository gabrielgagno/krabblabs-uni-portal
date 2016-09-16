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

    public function getAttendance($id, Request $request)
    {
        $result = User::find($id)->attendances;
        if(!$result) {
            return response()->json(
                array(
                    'success'   =>  false,
                    'error'     =>  'resource not found'
                ), 404
            );
        }
        if($request->get('data')) {
            return response()->json(
                array(
                    'data' => $result
                )
            );
        }

        return response()->json(
            array(
                'success'   =>  true,
                'result'    =>  $result
            )
        );
    }

    public function getTeamAttendance($projectId)
    {

    }

    // resource methods
    public function index()
    {
        return response()->json(array('data' => Attendance::all()));
    }
}
