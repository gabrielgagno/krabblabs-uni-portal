<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CutOffDate extends Model
{
    use SoftDeletes;

    protected $table = 'cutoff_dates';

    protected $fillable = [
        'date',
        'isPassed'
    ];

    protected $dates = ['deleted_at'];
}
