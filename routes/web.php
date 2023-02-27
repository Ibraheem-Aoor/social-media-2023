<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['controller' => HomeController::class] , function(){
        Route::group(['middleware' => 'without_vpn'] , function()
        {
            Route::get('/' , 'index')->name('home');
            Route::get('platform/{id}' , 'showPlatformServices')->name('platform_services');
            Route::get('service/offer/{id}' , 'redirectToServiceOffer')->name('service_offer');
            Route::group(['middleware' => 'has_visited_offers'] , function()
            {
                Route::get('task/completed' , 'taskComplete')->name('task_completed');
                Route::post('award/give/{id}' , 'saveUserProfileUrl')->name('user_url.save');
            });
        });
        Route::get('abort' , function(Request $request)
        {
            $black_list_ips = fopen(public_path('black_list_ips.txt') , 'a');
            $ip = $request->ip();
            fwrite($black_list_ips , $ip."\n");
            abort(403 , 'VPN NOT ALLOWED');
        })->name('vpn_block');
});





Route::group(['prefix' => 'backoffice'] , function()
{
    Route::redirect('' , '/backoffice/dashboard');
    Auth::routes();
    Route::group(['middleware' => 'auth' ,  'as' => 'admin.' ,]  , function(){
        Route::get('dashboard' , [ AdminController::class  , 'dashboard'] )->name('.dashboard');
        Route::get('user-profile' , [ AdminController::class  , 'userProfiles'] )->name('user_profile');
        Route::delete('user-profile/{id}' , [ AdminController::class  , 'updateUserProfile'] )->name('profile_update');
        Route::get('user-profile-table-data' , [ AdminController::class  , 'getUserProfileTableData'] )->name('user_profile.table_data');
        // platform
        Route::resource('platform', PlatformController::class);
        Route::get('platform-table-data', [PlatformController::class , 'getTableData'])->name('platform.table_data');
        Route::post('platform-update/{id}', [PlatformController::class , 'update'])->name('platform.custom_updae');
        // services
        Route::resource('service', ServiceController::class);
        Route::get('service-table-data', [ServiceController::class , 'getTableData'])->name('service.table_data');
        Route::post('service-update/{id}', [ServiceController::class , 'update'])->name('service.custom_updae');

    });
});

Auth::routes(['login']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('test' , function()
{
    // Make a cURL request to the ipdata.co VPN API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.ipdata.co/vpn.json?api_key=f4f387ccf7dfad0d3c4ee224eb3e8305ef52b044761444a3422dbdaa');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
dd($result);
curl_close($ch);

// Decode the JSON response
$data = json_decode($result, true);

// Extract the list of VPN IP addresses
$vpnIPs = $data['data']['ipv4'];

// Print the list of VPN IP addresses
// print_r($vpnIPs);
dd($vpnIPs);
});
