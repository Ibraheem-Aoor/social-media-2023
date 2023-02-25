<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use App\Transformers\PlatformTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Throwable;
use Yajra\DataTables\DataTables;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table_data_url']   = route('admin.platform.table_data');
        return view('admin.platform.index' , $data);
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
    public function store(Request $request)
    {
        $request->validate([
            'logo'  =>  'required|file|mimes:png,jpg,jpeg',
            'name'  =>  'required',
        ]);
        try{
            $logo = $request->file('logo');
            $logo_name = time().'.'.$logo->getClientOriginalExtension();
            $logo->storeAs('public/platforms/' , $logo_name);
            Platform::query()->create([
                'name'  =>  $request->name,
                'logo'  =>  $logo_name,
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.create_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = true;
            $response_data['modal_to_hiode'] = '#platform-create-update-modal';
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'logo'  =>  'nullable|file|mimes:png,jpg,jpeg',
            'name'  =>  'required',
        ]);
        try{
            $platform = Platform::query()->find($id);
            if($request->file('logo'))
            {
                $logo = $request->file('logo');
                $logo_name = time().'.'.$logo->getClientOriginalExtension();
                $logo->storeAs('public/platforms/' , $logo_name);
                Storage::disk('public')->delete("platforms/{$platform->logo}");
            }
            Platform::query()->update([
                'name'  =>  $request->name,
                'logo'  =>  $logo_name ?? $platform->logo,
            ]);
            $response_data['status'] = true;
            $response_data['message'] = __('custom.update_success');
            $response_data['refresh_table'] = true;
            $response_data['reset_form'] = false;
            $response_data['modal_to_hiode'] = '#platform-create-update-modal';
        }catch(Throwable $e)
        {
            dd($e);

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
            $platform  =   Platform::query()->find($id);
            Storage::disk('public')->delete("platforms/{$platform->logo}");
            $platform->delete();
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
        return DataTables::of(Platform::query()->get())->setTransformer(PlatformTransformer::class)->make(true);
    }

}
