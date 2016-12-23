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

Route::get('/keranjang', ['as' => 'keranjang', 'uses' => 'HomeController@getKeranjang']);
Route::get('/tambahkeranjang/{id}', ['as' => 'tambahKeranjang', 'uses' => 'HomeController@tambahKeranjang']);
Route::post('/ubahkeranjang', ['as' => 'ubahKeranjang', 'uses' => 'HomeController@ubahKeranjang']);
Route::get('/hapuskeranjang/{id}', ['as' => 'hapusKeranjang', 'uses' => 'HomeController@hapusKeranjang']);

Route::get('/pembayaran', ['as' => 'pembayaran', 'uses' => 'HomeController@getPembayaran']);


Route::get('/akun/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);


Route::group(['middleware' => ['pelangganRedir', 'adminRedir']], function(){

    Route::get('/akun/login', ['as' => 'login', 'uses' => 'HomeController@getLogin']);
    Route::post('/akun/login', ['as' => 'login', 'uses' => 'HomeController@postLogin']);
    Route::get('/akun/register', ['as' => 'register', 'uses' => 'HomeController@getRegister']);
    Route::post('/akun/register', ['as' => 'register', 'uses' => 'HomeController@postRegister']);

});

Route::group(['middleware' => [ 'pelanggan']], function(){

	Route::post('/pembayaran', ['as' => 'pembayaran', 'uses' => 'HomeController@postPembayaran']);

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function(){

    Route::get('/home', ['as' => 'adminHome', 'uses' => 'AdminController@getHome']);

    Route::get('/kategori', ['as' => 'kategori', 'uses' => 'AdminController@getKategori']);
    Route::post('/kategori', ['as' => 'kategori', 'uses' => 'AdminController@postKategori']);
    Route::delete('/kategori/delete', ['as' => 'delKategori', 'uses' => 'AdminController@delKategori']);

    Route::get('/satuan', ['as' => 'satuan', 'uses' => 'AdminController@getSatuan']);
    Route::post('/satuan', ['as' => 'satuan', 'uses' => 'AdminController@postSatuan']);
    Route::delete('/satuan/delete', ['as' => 'delSatuan', 'uses' => 'AdminController@delSatuan']);

    Route::get('/barang', ['as' => 'barang', 'uses' => 'AdminController@getBarang']);
    Route::post('/barang', ['as' => 'barang', 'uses' => 'AdminController@postBarang']);
    Route::get('/databarang', ['as' => 'barangData', 'uses' => 'AdminController@dataBarang']);

    Route::get('/validasitransaksi', ['as' => 'validasiTransaksi', 'uses' => 'AdminController@validasiTransaksi']);
    Route::post('validasitransaksi', ['as' => 'validasiTransaksi', 'uses' => 'AdminController@postValidasiTransaksi']);
    Route::get('/detailtransaksi/{id}', ['as' => 'detailTransaksi', 'uses' => 'AdminController@detailTransaksi']);
    Route::get('/datatransaksi', ['as' => 'dataTransaksi', 'uses' => 'AdminController@dataTransaksi']);
    
});
