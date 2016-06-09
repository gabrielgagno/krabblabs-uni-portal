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
        return $this->belongsTo('Department', 'department');
    }

    public function position()
    {
        return $this->belongsTo('Position', 'position');
    }

    public function paygrade()
    {
        return $this->belongsTo('Paygrade', 'paygrade');
    }

    public function requests()
    {
        return $this->belongsToMany('Request', 'user_requests', 'user', 'request');
    }

    public function requestApprovalQueue()
    {
        return $this->hasMany('Request', 'approver');
    }

    public function approver()
    {
        return $this->belongsToMany('User', 'approvers', 'user', 'approver');
    }

    public function approvalSubordinates()
    {
        return $this->belongsToMany('User', 'approvers', 'approver', 'user');
    }

    public function attendances()
    {
        return $this->hasMany('Attendance', 'user');
    }

    public function benefits()
    {
        return $this->hasMany('Benefit', 'user');
    }

    public function leaveBalances()
    {
        return $this->hasMany('LeaveBalance', 'user');
    }
}
