<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AttendanceController extends Controller
{

    // non-standard resource methods

    public function getTeamAttendance($projectId)
    {

    }

    // standard resource methods
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Attendance::withUser()->get();

        return response()->json(
            array(
                'success'   =>  true,
                'result'    =>  $result
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  string $date
     * @return \Illuminate\Http\Response
     */
    public function show($id, $date = null)
    {
        $result = User::find($id);
        if(!$result) {
            return response()->json(
                array(
                    'success'   =>  false,
                    'error'     =>  'resource not found'
                ), 404
            );
        }

        if($date) {
            $result = $result->attendances()->where('date', $date)->get();
        }
        else {
            $result = $result->attendances;
        }
        return response()->json(
            array(
                'success'   =>  true,
                'result'    =>  $result
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
