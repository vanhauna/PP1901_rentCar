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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@home')->name('welcome');
Route::get('/ajax','HomeController@ajax')->name('ajaxGetVehicle');
//Route::get('/admin/home', 'HomeController@index')->name('home_admin');
Route::get('/admin/home', 'AdminController@home')->name('home_admin');
