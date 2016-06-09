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
        'isHoliday',
        'leaveStatus'
    ];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo('User', 'user');
    }
}
