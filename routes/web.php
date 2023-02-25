<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PlatformController;
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
});





Route::group(['prefix' => 'backoffice'] , function()
{
    Route::redirect('' , '/backoffice/dashboard');
    Auth::routes();
    Route::group(['middleware' => 'auth' ,  'as' => 'admin.' ,]  , function(){
        Route::get('dashboard' , [ AdminController::class  , 'dashboard'] )->name('.dashboard');
        Route::resource('platform', PlatformController::class);
        Route::get('platform-table-data', [PlatformController::class , 'getTableData'])->name('platform.table_data');
        Route::post('platform-update/{id}', [PlatformController::class , 'update'])->name('platform.custom_updae');
    });
});

Auth::routes(['login']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
