<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeaveBalance extends Model
{
    use SoftDeletes;

    protected $table = 'leave_balances';

    protected $fillable = [
        'sickLeaves',
        'vacationLeaves',
        'parentalLeaves',
        'bereavementLeaves',
        'leavesWoPay'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
