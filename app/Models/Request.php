<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use SoftDeletes;
    
    protected $table = 'requests';
    
    protected $fillable = [
        'requestType',
        'dateFrom',
        'dateTo',
        'status',
        'reason'
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('User', 'user_requests', 'user');
    }
}
