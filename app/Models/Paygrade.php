<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paygrade extends Model
{
    use SoftDeletes;

    protected $table = 'paygrades';

    protected $fillable = [
        'paygradeNumber',
        'min',
        'max'
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
