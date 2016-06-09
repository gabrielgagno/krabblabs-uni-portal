<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Benefit extends Model
{
    use SoftDeletes;

    protected $table = 'benefits';

    protected $fillable = [
        'benefitCode',
        'benefitName',
        'benefitAmount'
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('User', 'user');
    }
}
