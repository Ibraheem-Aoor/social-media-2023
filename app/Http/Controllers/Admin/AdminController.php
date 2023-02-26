<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Transformers\UserProfileTransfrormer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Services\DataTable;

class AdminController extends Controller
{
    public function dashboard()
    {
        app()->setLocale('ar');
        return view('admin.dashboard');
    }


    public function userProfiles()
    {
        $data['table_data_url'] =   route('admin.user_profile.table_data');
        return view('admin.user_profile.index'  , $data);
    }

    public function getUserProfileTableData()
    {
        return DataTables::of(Profile::query()->with('service.platform'))->setTransformer(UserProfileTransfrormer::class)->make(true);
    }
}
