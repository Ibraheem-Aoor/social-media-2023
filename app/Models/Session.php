<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'sessions';

    protected $primaryKey = 'id';

    // public $incrementing = false;



    protected $fillable = [
        'id',
        'ip_address',
        'user_agent',
        'visited',
        'service_id',
    ];
}
