<?php

use App\Http\Controllers\Auth\BannerController;
use App\Http\Controllers\Auth\CateNewController;
use App\Http\Controllers\Auth\CateRealtyController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\NewController;
use App\Http\Controllers\Auth\RealtyController;
use App\Http\Controllers\Auth\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/signin', ['as' => 'signin', 'uses' => 'App\Http\Controllers\Auth\LoginController@getLogin']);
Route::post('/signin', ['as' =>'signin','uses'=>'App\Http\Controllers\Auth\LoginController@postLogin']);
Route::get('/signout', ['as' =>'signout','uses'=>'App\Http\Controllers\Auth\LoginController@getLogout']);
Route::middleware(['auth'])->prefix('/admin')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('route_Dashboard_index');
    Route::get('categotiesRealty',[CateRealtyController::class,'list'])->name('route_CateRealty_list');
        Route::match(['get', 'post'], 'categotiesRealty/add', [CateRealtyController::class,'add'])->name('route_CateRealty_add');
        Route::match(['get','post'], '/categotiesRealty/edit/{id}', [CateRealtyController::class,'edit'])->name('route_CateRealty_Edit');
    Route::get('realty',[RealtyController::class,'list'])->name('route_Realty_list');
    Route::get('categotiesNew',[CateNewController::class,'list'])->name('route_CateNew_list');
        Route::match(['get', 'post'], 'categotiesNew/add', [CateNewController::class,'add'])->name('route_CateNew_add');
        Route::match(['get', 'post'], 'categotiesNew/edit/{id}', [CateNewController::class,'edit'])->name('route_CateNew_edit');
    Route::get('new',[NewController::class,'list'])->name('route_New_list');
    Route::get('banner',[BannerController::class,'list'])->name('route_Banner_list');
        Route::match(['get', 'post'], 'banner/add', [BannerController::class,'add'])->name('route_Banner_add');
        Route::match(['get','post'], '/banner/edit/{id}', [BannerController::class,'edit'])->name('route_Banner_Edit');
    Route::get('user',[UserController::class,'list'])->name('route_User_list');
});

Route::get('/','App\Http\Controllers\Client\HomeController@index');
Route::get('/realty','App\Http\Controllers\Client\RealtyController@index');
Route::get('/realty-detail','App\Http\Controllers\Client\RealtyController@realtyDetail');
Route::get('/news','App\Http\Controllers\Client\NewController@index');