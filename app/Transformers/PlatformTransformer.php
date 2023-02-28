<?php

namespace App\Transformers;

use App\Models\Platform;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use League\Fractal\TransformerAbstract;

class PlatformTransformer extends TransformerAbstract
{
    /**
     * @param \App\BolAccountTransformer $bolAccountTransformer
     * @return array
     */
    public function transform(Platform $platform): array
    {
        $logo = Storage::url("platforms/{$platform->logo}");
        return [
            'logo'      =>      "<img width='100' src={$logo}>",
            'name'  =>  $platform->name,
            'created_at'   =>   Carbon::parse($platform->created_at)->toDateTimeString(),
            'actions'      => $this->getActionButtons($platform),
        ];
    }


    public function getActionButtons($platform)
    {
        $logo = $platform->getLogo();
        return "
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.platform.destroy' , $platform->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$platform->name."' id='row-".$platform->id."'><i class='fa fa-trash'></i></button>
        ";
    }
}
