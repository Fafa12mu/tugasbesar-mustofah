<?php

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

Route::group(['middleware' => ['guest']], function () {
    //untuk login
    Route::get("/", "PageController@login")->name('login');

    Route::post("/ceklogin", "AuthController@ceklogin");

    Route::get("/search", "PageController@search");

    Route::get("/actsearch", "PageController@actsearch");

    //register
    Route::get('/register', "PageController@register");

    Route::post('/registrasi', "PageController@registrasi");

});

Route::group(['middleware' => ['auth']], function () {
    //UNTUK TAMPILAN HOME
    Route::get("/index", "PageController@index");

    Route::post("/tambahdata", "PageController@tambahdata");

    Route::post("/updatedata/{id}", "PageController@updatedata");

    Route::get("/hapus/{id}", "PageController@hapus");

    Route::get("/actsearch", "PageController@actsearch");

    //UNTUK TAMPILAN BARANGMASUK
    Route::get("/barangmasuk", "barangMasukController@barangmasuk");

    Route::post("/adddata", "barangMasukController@adddata"); 

    Route::post("/editdata/{id}", "barangMasukController@editdata");

    Route::get("hapusdbm/{id}", "barangMasukController@hapusdbm");

    //untyuk tampilan barang keluar
    Route::get("/barangkeluar", "barangKeluarController@barangkeluar");

    Route::post("/adddatak", "barangKeluarController@adddatak"); 

    Route::post("/editdatak/{id}", "barangKeluarController@editdatak");

    Route::get("hapusdbk/{id}", "barangKeluarController@hapusdbm");

    //Login
    Route::get('/logout', "AuthController@ceklogout");

    Route::get('/edituser', "PageController@edituser");

    Route::post('/updateuser', "PageController@updateuser");

});



