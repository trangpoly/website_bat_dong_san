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
        Route::match(['get', 'post'], 'categotiesRealty/add', [CateRealtyController::class,'add'])->name('route_CateRealty_Add');
        Route::match(['get','post'], 'categotiesRealty/detail/{id}', [CateRealtyController::class,'detail'])->name('route_CateRealty_Detail');
        Route::post('categotiesRealty/update/{id}',[CateRealtyController::class,'update'])->name('route_CateRealty_Update');

    Route::get('realty',[RealtyController::class,'list'])->name('route_Realty_list');
        Route::match(['get', 'post'], 'realty/add', [RealtyController::class,'add'])->name('route_Realty_Add');
        Route::match(['get', 'post'], 'realty/detail/{id}', [RealtyController::class,'detail'])->name('route_Realty_Detail');

    Route::get('categotiesNew',[CateNewController::class,'list'])->name('route_CateNew_list');
        Route::match(['get', 'post'], 'categotiesNew/add', [CateNewController::class,'add'])->name('route_CateNew_Add');
        Route::match(['get', 'post'], 'categotiesNew/detail/{id}', [CateNewController::class,'detail'])->name('route_CateNew_Detail');
        Route::post('categotiesNew/update/{id}',[CateNewController::class,'update'])->name('route_CateNew_Update');
    Route::get('new',[NewController::class,'list'])->name('route_New_list');
        Route::match(['get', 'post'], 'new/add', [NewController::class,'add'])->name('route_New_Add');
        Route::match(['get','post'], 'new/detail/{id}', [NewController::class,'detail'])->name('route_New_Detail');
        Route::post('new/update/{id}',[NewController::class,'update'])->name('route_New_Update');

    Route::get('banner',[BannerController::class,'list'])->name('route_Banner_list');
        Route::match(['get', 'post'], 'banner/add', [BannerController::class,'add'])->name('route_Banner_Add');
        Route::match(['get','post'], 'banner/detail/{id}', [BannerController::class,'detail'])->name('route_Banner_Detail');
        Route::post('banner/update/{id}',[BannerController::class,'update'])->name('route_Banner_Update');
        
    Route::get('user',[UserController::class,'list'])->name('route_User_list');
        Route::match(['get', 'post'], 'user/add', [UserController::class,'add'])->name('route_User_Add');
        Route::match(['get','post'], 'user/detail/{id}', [UserController::class,'detail'])->name('route_User_Detail');
        Route::post('user/update/{id}',[UserController::class,'update'])->name('route_User_Update');
});

Route::get('/','App\Http\Controllers\Client\HomeController@index');
Route::get('/realty','App\Http\Controllers\Client\RealtyController@index');
Route::get('/realty-detail','App\Http\Controllers\Client\RealtyController@realtyDetail');
Route::get('/news','App\Http\Controllers\Client\NewController@index');