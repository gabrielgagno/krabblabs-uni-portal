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
        return $this->hasMany('User', 'department');
    }

    public function deptHead()
    {
        return $this->belongsTo('User', 'deptHead');
    }

    public function positions()
    {
        return $this->hasMany('Position', 'department');
    }
}
