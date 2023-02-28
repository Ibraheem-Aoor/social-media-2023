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
            'platform' =>  $profile?->service?->platform?->name,
            'service' =>  $profile->service?->name,
            'created_at'   =>   Carbon::parse($profile->created_at)->toDateTimeString(),
            'actions'      => $this->getActionButtons($profile),
        ];
    }


    public function getActionButtons($profile)
    {
        if(!$profile->is_completed)
        {
            return "
            <button type='button' data-toggle='modal' data-target='#profile-update-modal' class='btn-xs btn-danger'
            data-delete-url='".route('admin.profile_update' , $profile->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$profile->name."' id='row-".$profile->id."'><i class='fa fa-trash'></i></button>
            ";
        }
    }


}
