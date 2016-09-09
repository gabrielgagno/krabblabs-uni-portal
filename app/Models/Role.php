<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'role_key',
        'role_name',
        'role_description'
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'role_permissions');
    }
}
