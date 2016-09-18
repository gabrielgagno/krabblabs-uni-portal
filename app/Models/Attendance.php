<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use SoftDeletes;

    protected $table = 'attendances';

    protected $fillable = [
        'date',
        'timeIn',
        'timeOut',
        'oldTimeIn',
        'oldTimeOut',
        'actualHours',
        'isHoliday',
        'leaveStatus',
        'timesList'
    ];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function scopeWithUser($query)
    {
        return $query->leftJoin('users as usr', 'usr.id', '=', 'attendances.user_id')
            ->select(
                'usr.lastName',
                'usr.firstName',
                'attendances.date',
                'attendances.actualHours',
                'attendances.timeIn',
                'attendances.timeOut');
    }
}
