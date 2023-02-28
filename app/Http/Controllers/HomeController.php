<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Profile;
use App\Models\Service;
use App\Models\Session;
use App\Models\TempUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Throwable;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if($request->query('create_new'))
        {
            $database_session = TempUser::query()->create([
                'ip_address'        =>  $request->ip(),
                'visited'        =>  false,
            ]);
            session()->put('database_session_id'  , $database_session->id);
        }
        elseif(!session()->get('database_session_id'))
        {
            $database_session = TempUser::query()->create([
                'ip_address'        =>  $request->ip(),
                'visited'        =>  false,
            ]);
            session()->put('database_session_id'  , $database_session->id);
        }
        $black_list_ips = fopen(public_path('vpn.txt') , 'a');
        $ip = $request->ip();
        fwrite($black_list_ips , $ip."\n");
        $data['platforms'] = Platform::query()->orderByDesc('created_at')->get();
        return view('home' , $data);
    }

    public function showPlatformServices($id)
    {
        $data['platform'] = Platform::query()->with('services' , function($services){
            $services->where('is_published' , true);
        })->findOrFail(decrypt($id));
        // dd($data['platform']->services()->first()->getFeatures());
        // dd($data);
        $data['class']  =   $data['platform']->getServicesViewClumnSize();
        return view('platform_services' , $data);
    }

    public function redirectToServiceOffer($id)
    {
        try{
            $service = Service::query()->find(decrypt($id));
            $temp_user = TempUser::find(session()->get('database_session_id'));
            $temp_user->visited = true;
            $temp_user->service_id = $service->id;
            session()->put('has_visited' ,  1);
            $temp_user->save();
            return redirect($service->offer_url);
        }catch(Throwable $e)
        {
            // dd($e);
            session()->flash('error' , 'Something Went Wrong');
            return redirect()->back();
        }
    }


    /**
     *  this is the callback function that the offers website returb our user back to.
     *  here the user has visited the offers site and only what left is to give us his profile.
     */
    public function taskComplete()
    {
        $temp_user = TempUser::find(session()->get('database_session_id'));
        if(@$temp_user->visited && session()->has('has_visited') && session()->get('has_visited') == 1)
        {
            $data['service_id'] =     $temp_user->service_id;
            $data['form_route'] =   route("user_url.save" , encrypt($data['service_id']));
            $data['task_title'] = Service::query()->find($temp_user->service_id)?->task_title;
            return view('url_form' , $data);
        }else{
            return redirect(route('home'));
        }
    }


    /**
     * save user profile url
     */
    public function saveUserProfileUrl(Request $request , $id)
    {
        try{
            $request->validate([
                'profile'       =>  'required',
            ]);
            Service::query()->findOrFail(decrypt($id));
            Profile::query()->create([
                'url'   => $request->profile,
                'service_id'    =>  decrypt($id),
            ]);
            $temp_user = TempUser::find(session()->get('database_session_id'));
            session()->forget('database_session_id');
            session()->flush();
            session()->put('has_visited' ,  0);
            $temp_user->delete();
            return redirect(route('home' , ['create_new' => true]))->with('success' , 'Done Successfully ✅');
        }catch(Throwable $e)
        {
            session()->flash('error'  , 'something went wrong');
            return redirect(route('home'));
        }
    }
}
