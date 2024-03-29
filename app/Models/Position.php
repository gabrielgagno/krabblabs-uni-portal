<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;

    protected $table = 'positions';

    protected $fillable = [
        'positionCode',
        'title',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
