<?php

namespace App\Transformers;

use App\Models\Platform;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use League\Fractal\TransformerAbstract;

class ServiceTransformer extends TransformerAbstract
{
    /**
     * @param \App\BolAccountTransformer $bolAccountTransformer
     * @return array
     */
    public function transform(Service $service): array
    {
        $platform_logo =   asset("storage/platforms/{$service->platform->logo}");
        return [
            'platform_logo'      =>      "<img width='100' src={$platform_logo}>",
            'name'  =>  $service->name,
            'is_published' =>  $service->is_published,
            'created_at'   =>   Carbon::parse($service->created_at)->toDateTimeString(),
            'actions'      => $this->getActionButtons($service),
        ];
    }


    public function getActionButtons($service)
    {
        return "<button class='btn-xs btn-success'  data-toggle='modal' data-target='#service-create-update-modal'
        data-action='".route('admin.service.custom_updae' , $service->id)."' data-method='POST'      data-service='".json_encode($service)."' data-is-create='false'><i class='fa fa-edit'></i></button>
        <button type='button' data-toggle='modal' data-target='#delete-modal' class='btn-xs btn-danger'
        data-delete-url='".route('admin.service.destroy' , $service->id)."' data-message='".__('custom.confirm_delete')."' data-name='".$service->name."' id='row-".$service->id."'><i class='fa fa-trash'></i></button>
        ";
    }
}
