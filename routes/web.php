<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlatformController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\HomeController;
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
    Route::get('/' , 'index')->name('home');
    Route::get('platform/{id}' , 'showPlatformServices')->name('platform_services');
    Route::get('service/offer/{id}' , 'redirectToServiceOffer')->name('service_offer');
    Route::get('task/completed' , 'taskComplete')->name('task_completed')->middleware('has_visited_offers');
    Route::post('award/give/{id}' , 'saveUserProfileUrl')->name('user_url.save')->middleware('has_visited_offers');
});





Route::group(['prefix' => 'backoffice'] , function()
{
    Route::redirect('' , '/backoffice/dashboard');
    Auth::routes();
    Route::group(['middleware' => 'auth' ,  'as' => 'admin.' ,]  , function(){
        Route::get('dashboard' , [ AdminController::class  , 'dashboard'] )->name('.dashboard');
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
