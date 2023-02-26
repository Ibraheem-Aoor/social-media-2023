<?php

namespace App\Transformers;

use App\Models\Platform;
use App\Models\Profile;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use League\Fractal\TransformerAbstract;

class UserProfileTransfrormer extends TransformerAbstract
{
    /**
     * @param \App\BolAccountTransformer $bolAccountTransformer
     * @return array
     */
    public function transform(Profile $profile): array
    {
        return [
            'url'  =>  $profile->url,
            'platform' =>  $profile->service->platform->name,
            'service' =>  $profile->service->name,
            'created_at'   =>   Carbon::parse($profile->created_at)->toDateTimeString(),
        ];
    }


}
