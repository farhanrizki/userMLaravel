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

Route::get('/', function () {
    return view('pages.login');
});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');
Route::post('/register','DataUserController@register');

//fungsi middleware disini buat filter kalo user belum login tidak bisa akses lewat url 
Route::group(['middleware' => ['auth','checkRole:admin']], function(){
	Route::get('/dashboard','DashboardController@index');
	Route::get('/datauser','DataUserController@index');
	Route::post('/tambahuser','DataUserController@tambah');
	Route::post('/updateuser/{id}','DataUserController@update');
	Route::get('/deleteuser/{id}','DataUserController@delete');
});

Route::group(['middleware' => ['auth','checkRole:admin,staff']], function(){
	Route::get('/dashboard','DashboardController@index');
});