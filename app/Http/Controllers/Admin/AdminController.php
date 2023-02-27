<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Transformers\UserProfileTransfrormer;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class AdminController extends Controller
{
    public function dashboard()
    {
        app()->setLocale('ar');
        return view('admin.dashboard');
    }


    /**
     * users profile  url
     */

    public function userProfiles(Request $request)
    {
        $data['table_data_url'] =   route('admin.user_profile.table_data', ['is_completed' => $request->is_completed]);
        return view('admin.user_profile.index'  , $data);
    }


    public function getUserProfileTableData(Request $request)
    {
        return DataTables::of(Profile::query()->with('service.platform')->where('is_completed' , $request->is_completed))->setTransformer(UserProfileTransfrormer::class)->make(true);
    }

    public function updateUserProfile($id)
    {
        try{
            $platform  =   Profile::query()->find($id);
            $platform->is_completed = true;
            $platform->save();
            $respnse_data['status'] = true;
            $respnse_data['is_deleted'] = true;
            $respnse_data['message'] = __('custom.updated_success');
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
}
