<?php

use App\Http\Controllers\Auth\BannerController;
use App\Http\Controllers\Auth\CateNewController;
use App\Http\Controllers\Auth\CateRealtyController;
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
Route::get('/logout', ['as' =>'logout','uses'=>'Auth\LoginController@getLogout']);

//
Route::get('/signin', ['as' => 'signin', 'uses' => 'App\Http\Controllers\Auth\LoginController@getLogin']);
Route::post('/signin', ['as' =>'signin','uses'=>'App\Http\Controllers\Auth\LoginController@postLogin']);
Route::get('/signout', ['as' =>'signout','uses'=>'App\Http\Controllers\Auth\LoginController@getLogout']);
Route::middleware(['auth'])->prefix('/admin')->group(function(){
    Route::get('','App\Http\Controllers\Auth\DashboardController@index')->name('route_Dashboard_index');

    Route::get('categotiesRealty','App\Http\Controllers\Auth\CateRealtyController@list')->name('route_CateRealty_list');
        Route::match(['get', 'post'], 'categotiesRealty/add', 'App\Http\Controllers\Auth\CateRealtyController@add')->name('route_CateRealty_Add');
        Route::match(['get','post'], 'categotiesRealty/detail/{id}', 'App\Http\Controllers\Auth\CateRealtyController@detail')->name('route_CateRealty_Detail');
        Route::post('categotiesRealty/update/{id}', 'App\Http\Controllers\Auth\CateRealtyController@update')->name('route_CateRealty_Update');
        Route::get('categotiesRealty/remove/{id}','App\Http\Controllers\Auth\CateRealtyController@remove')->name('route_CateRealty_Remove');

    Route::get('realty','App\Http\Controllers\Auth\RealtyController@list')->name('route_Realty_list');
        Route::match(['get', 'post'], 'realty/add', 'App\Http\Controllers\Auth\RealtyController@add')->name('route_Realty_Add');
        Route::match(['get', 'post'], 'realty/detail/{id}', 'App\Http\Controllers\Auth\RealtyController@detail')->name('route_Realty_Detail');
        Route::post('realty/update/{id}','App\Http\Controllers\Auth\RealtyController@update')->name('route_Realty_Update');
        Route::get('realty/remove/{id}','App\Http\Controllers\Auth\RealtyController@remove')->name('route_Realty_Remove');

    Route::get('categotiesNew','App\Http\Controllers\Auth\CateNewController@list')->name('route_CateNew_list');
        Route::match(['get', 'post'], 'categotiesNew/add', 'App\Http\Controllers\Auth\CateNewController@add')->name('route_CateNew_Add');
        Route::match(['get', 'post'], 'categotiesNew/detail/{id}', 'App\Http\Controllers\Auth\CateNewController@detail')->name('route_CateNew_Detail');
        Route::post('categotiesNew/update/{id}','App\Http\Controllers\Auth\CateNewController@update')->name('route_CateNew_Update');
        Route::get('categotiesNew/remove/{id}','App\Http\Controllers\Auth\CateNewController@remove')->name('route_CateNew_Remove');

    Route::get('new', 'App\Http\Controllers\Auth\NewController@list')->name('route_New_list');
        Route::match(['get', 'post'], 'new/add', 'App\Http\Controllers\Auth\NewController@add')->name('route_New_Add');
        Route::match(['get','post'], 'new/detail/{id}', 'App\Http\Controllers\Auth\NewController@detail')->name('route_New_Detail');
        Route::post('new/update/{id}','App\Http\Controllers\Auth\NewController@update')->name('route_New_Update');
        Route::get('new/remove/{id}','App\Http\Controllers\Auth\NewController@remove')->name('route_New_Remove');

    Route::get('banner','App\Http\Controllers\Auth\BannerController@list')->name('route_Banner_list');
        Route::match(['get', 'post'], 'banner/add','App\Http\Controllers\Auth\BannerController@add')->name('route_Banner_Add');
        Route::match(['get','post'], 'banner/detail/{id}', 'App\Http\Controllers\Auth\BannerController@detail')->name('route_Banner_Detail');
        Route::post('banner/update/{id}','App\Http\Controllers\Auth\BannerController@update')->name('route_Banner_Update');
        Route::get('banner/remove/{id}','App\Http\Controllers\Auth\BannerController@remove')->name('route_Banner_Remove');
        
    Route::get('user','App\Http\Controllers\Auth\UserController@list')->name('route_User_list');
        Route::match(['get', 'post'], 'user/add', 'App\Http\Controllers\Auth\UserController@add')->name('route_User_Add');
        Route::match(['get','post'], 'user/detail/{id}', 'App\Http\Controllers\Auth\UserController@detail')->name('route_User_Detail');
        Route::post('user/update/{id}','App\Http\Controllers\Auth\UserController@update')->name('route_User_Update');
        Route::get('user/remove/{id}','App\Http\Controllers\Auth\UserController@remove')->name('route_User_Remove');
});

Route::get('/','App\Http\Controllers\Client\HomeController@index');
Route::get('/realty','App\Http\Controllers\Client\RealtyController@index');
Route::get('/realty-detail','App\Http\Controllers\Client\RealtyController@realtyDetail');
Route::get('/news','App\Http\Controllers\Client\NewController@index');