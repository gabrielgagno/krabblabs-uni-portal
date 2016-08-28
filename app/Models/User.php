<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
