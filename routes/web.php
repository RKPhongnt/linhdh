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
    return view('layouts.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
	Route::get('/','admin\UsersController@index');
	Route::resource('users', 'admin\UsersController');
	Route::resource('divisions', 'admin\DivisionsController');
});


Route::resource('divisions','DivisionsController',['except'=>['create','store','destroy']]);
Route::resource('users','UsersController',['except'=>['create','store','destroy','updateDivision']]);
Route::post('/search','DivisionsController@search')->name('search');
Route::post('users/{id}/update','UsersController@updateDivision');
