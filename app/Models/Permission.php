<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'permission_key',
        'permission_name'
    ];

    protected $dates = ['deleted_at'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_permissions');
    }
}
