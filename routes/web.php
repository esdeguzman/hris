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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show-status', 'HomeController@showStatus')->name('show-status');


Route::put('/change-status/{user}', 'HomeController@changeStatus')->name('change-status');
Route::put('/change-password', 'HomeController@changePassword')->name('change-password');
