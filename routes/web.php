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

Route::get('/', function () {
    return view('home');
});

Route::get('/items/create', 'ItemController@create'); // menampilkan halaman form
Route::post('/items', 'ItemController@store'); // menyimpan data
Route::get('/items', 'ItemController@index'); // menampilkan semua
Route::get('/items/{id}', 'ItemController@show'); // menampilkan detail item dengan id 
Route::get('/items/{id}/edit', 'ItemController@edit'); // menampilkan form untuk edit item
Route::put('/items/{id}', 'ItemController@update'); // menyimpan perubahan dari form edit
Route::delete('/items/{id}', 'ItemController@destroy'); // menghapus data dengan id

route::get('/proyek','proyekController@index');//sudah
route::get('/proyek/create','proyekController@create');//sudah
route::post('/proyek','proyekController@store');//sudah
route::get('/proyek/{id}/daftarkan-staff','proyekController@createStaff');
route::post('/proyek/{id}/daftarkan-staff','proyekController@storeStaff');
Route::get('/proyek/{id}/edit', 'proyekController@edit');//sudah
Route::put('/proyek/{id}', 'proyekController@update');//sudah
Route::delete('/proyek/{id}', 'proyekController@destroy');//sudah
Route::get('/proyek/{id}', 'proyekController@show');

