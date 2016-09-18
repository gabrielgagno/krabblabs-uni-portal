<?php

namespace App\Models;

use App\Helpers\FormatHelper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\DomCrawler\Form;
use DateTime;
use DB;

class User extends Authenticatable
{

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employeeNumber',
        'firstName',
        'middleName',
        'lastName',
        'salary',
        'status',
        'dateStarted',
        'dateLeft',
        'email',
        'password',
        'sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function paygrade()
    {
        return $this->belongsTo('App\Models\Paygrade');
    }

    public function requests()
    {
        return $this->belongsToMany('App\Models\Request', 'user_requests');
    }

    public function requestApprovalQueue()
    {
        return $this->hasMany('App\Models\Request', 'approver');
    }

    public function approver()
    {
        return $this->belongsToMany('App\Models\User', 'approvers');
    }

    public function approvalSubordinates()
    {
        return $this->belongsToMany('App\Models\User', 'approvers', 'approver');
    }

    public function attendances()
    {
        return $this->hasMany('App\Models\Attendance');
    }

    public function benefits()
    {
        return $this->hasMany('App\Models\Benefit');
    }

    public function leaveBalances()
    {
        return $this->hasMany('App\Models\LeaveBalance');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function timeLogIn($timestamp)
    {
        // get date part
        $date = FormatHelper::splitDateTime($timestamp, FormatHelper::SPLIT_DATE);

        // check if exists (timeIn)
        // if so, ignore
        //else, create
        $result = $this->attendances()->where('date', '=', $date)->first();
        if($result) {
            return "data-already-exists";
        }
        $this->attendances()->create(array(
            'date' => $date,
            'timeIn' => $timestamp
        ));
        return "success";
    }

    public function logTime($timestamp)
    {
        // get date part
        $date = FormatHelper::splitDateTime($timestamp, FormatHelper::SPLIT_DATE);

        // check if exists (timeIn)
        // if so, log time to logout
        //else, create
        $result = $this->attendances()->where('date', '=', $date)->first();
        if($result) {
            DB::beginTransaction();
            try{
                $timeIn = new DateTime($result->timeIn);
                $timeOut = new DateTime($timestamp);
                $diff = $timeOut->diff($timeIn);
                $actualHours = $diff->h + ($diff->i/60) + ($diff->s/3600);
                $result->update(array(
                    'timeIn'        =>  $timeIn,
                    'timeOut'       =>  $timeOut,
                    'actualHours'   =>  $actualHours,
                    'timesList'     =>  FormatHelper::addTimeToTimeList($timestamp, $result->timesList)
                ));
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return array(
                    'result'    =>  'error',
                    'message'   =>  $e->getTraceAsString()
                );
            }

            return array(
                'result'    =>  'success',
                'message'   =>  'successfully-logged-out',
                'action'    =>  'logout'
            );
        }
        DB::beginTransaction();
        try{
            $this->attendances()->create(array(
                'date' => $date,
                'timeIn' => $timestamp,
                'timesList'     =>  FormatHelper::addTimeToTimeList($timestamp)
            ));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return array(
                'result'    =>  'error',
                'message'   =>  $e->getTraceAsString()
            );
        }
        return array(
            'result'    =>  'success',
            'message'   =>  'successfully-logged-out',
            'action'    =>  'logout'
        );
    }
}
