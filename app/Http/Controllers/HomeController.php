<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        $data['platforms'] = Platform::query()->get();
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
            session()->put('visited' , 1);
            session()->put('service_id' , $service->id);
            return redirect($service->offer_url);
        }catch(Throwable $e)
        {
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
        if(session()->has('visited') && session()->get('visited') == 1)
        {
            $data['service_id'] =     session()->get('service_id'); ;
            $data['form_route'] =   route("user_url.save" , encrypt($data['service_id']));
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
            session()->flash('success' , 'Done Successfully ✅');
            session()->put('visited' , 0);
            return redirect(route('home'));
        }catch(Throwable $e)
        {
            session()->flash('error'  , 'something went wrong');
            return redirect(route('home'));
        }
    }
}
