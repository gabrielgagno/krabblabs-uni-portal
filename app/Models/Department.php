<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    
    protected $table = 'departments';
    
    protected $fillable = [
        'deptCode',
        'deptName',
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function deptHead()
    {
        return $this->belongsTo('App\Models\User', 'deptHead');
    }

    public function positions()
    {
        return $this->hasMany('App\Models\Position');
    }
}
