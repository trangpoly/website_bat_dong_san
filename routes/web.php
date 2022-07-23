<?php

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
Route:: middleware(['auth'])->group(function(){
    Route::get('/admin','App\Http\Controllers\Auth\DashboardController@index');
    Route::get('/categotiesRealty','App\Http\Controllers\Auth\CateRealtyController@list')->name('route_CateRealy_list');
    Route::get('/realty','App\Http\Controllers\Auth\RealtyController@list')->name('route_Realy_list');
    Route::get('/categotiesNew','App\Http\Controllers\Auth\CateNewController@list')->name('route_CateNew_list');
    Route::get('/new','App\Http\Controllers\Auth\NewController@list')->name('route_New_list');
    Route::get('/banner','App\Http\Controllers\Auth\BannerController@list')->name('route_Banner_list');
    Route::get('/user','App\Http\Controllers\Auth\UserController@list')->name('route_User_list');
});

Route::get('/','App\Http\Controllers\Client\HomeController@index');