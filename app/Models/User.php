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
        'isManager',
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

    }
}
