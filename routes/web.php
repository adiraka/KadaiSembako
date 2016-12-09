<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/test', ['as' => 'test', 'uses' => 'HomeController@test']);

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@getHome']);

Route::get('/produk', ['as' => 'produk', 'uses' => 'HomeController@getProduk']);

Route::post('/akun/login', ['as' => 'login', 'uses' => 'HomeController@postLogin']);

Route::post('/akun/register', ['as' => 'register', 'uses' => 'HomeController@postRegister']);

Route::get('/akun/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);


Route::group(['middleware' => ['pelangganRedir', 'adminRedir']], function(){

    Route::get('/akun', ['as' => 'akun', 'uses' => 'HomeController@getLogin']);

});

Route::group(['middleware' => ['auth', 'admin']], function(){

    Route::get('/admin/home', ['as' => 'adminHome', 'uses' => 'AdminController@getHome']);
    
});
