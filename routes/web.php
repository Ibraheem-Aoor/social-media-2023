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
    dd(
        decrypt('eyJpdiI6IldTdWxiR0JoQU9KaFR2aXJQUXZDanc9PSIsInZhbHVlIjoicjlQc1JPV3pWOXgxSm00dldnUkFIUT09IiwibWFjIjoiYTIxMDAzMWMzNGFlNmVmMDdkZDNjOGUwMzJkN2VlNTlmNDJkMmEzMzNhN2JkNzUxYTc2MzVmMGM1NWEwMGIxOCIsInRhZyI6IiJ9')
    );
});
