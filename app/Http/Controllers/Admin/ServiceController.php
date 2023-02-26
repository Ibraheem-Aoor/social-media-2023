<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceRequest;
use App\Models\Platform;
use App\Models\Service;
use App\Transformers\ServiceTransformer;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url']   = route('admin.service.table_data');
        $data['platforms']         =  Platform::query()->get();
        return view('admin.service.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        try{
            $data =  $request->toArray();
            $data['features'] = json_encode($data['features']);
            Service::query()->create($data);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#service-create-update-modal';
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smth_wrong');
            $response_data['refresh_table'] = false;
            $response_data['reset_form'] = false;
        }
        return response()->json($response_data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request , $id)
    {
        try{
            $service = Service::query()->find($id);
            $data =  $request->toArray();
            $data['features'] = json_encode($data['features']);
            $service->update($data);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.updated_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#service-create-update-modal';
        }catch(Throwable $e)
        {
            $response_data['status'] = false;
            $response_data['message'] = __('custom.smth_wrong');
            $response_data['refresh_table'] = false;
            $response_data['reset_form'] = false;
        }
        return response()->json($response_data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try{
            $service  =   Service::query()->find($id);
            $service->delete();
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.deleted_successflly');
            $respnse_data['row'] = $id;
            $error_no = 200;
        }
        catch(Throwable $e)
        {
            $respnse_data['message'] = _('custom.smth_wrong');
            $error_no = 500;
        }
        return response()->json($respnse_data, $error_no);
    }

     /**
     * table data
     * @return Datatables
     */
    public function getTableData()
    {
        return DataTables::of(Service::query()->with('platform'))->setTransformer(ServiceTransformer::class)->make(true);
    }

}
