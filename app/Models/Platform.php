<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
    ];

    public function getLogo()
    {
        return Storage::url("platforms/{$this->logo}");
    }

    public function services() : HasMany
    {
        return $this->hasMany(Service::class , 'platform_id');
    }


    public function getServicesViewClumnSize()
    {
        $services_count = $this->services()->count();
        $class = 'col-lg-12';
        if($services_count == 2)
        {
            $class = 'col-lg-6';
        }elseif($services_count == 3)
        {
            $class = 'col-lg-4';
        }elseif($services_count > 3)
        {
            $class = 'col-lg-3';
        }
        return $class;
    }
}
