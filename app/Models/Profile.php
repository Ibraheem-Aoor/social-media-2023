<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['url' , 'service_id' , 'status'];


    public function service() : BelongsTo
    {
        return $this->belongsTo(Service::class , 'service_id');
    }
}
