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

Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('verify/{email}/{token}', 'Auth\RegisterController@verifyUser')->name('verify');

Route::resource('posts', 'PostController');
Route::post('posts/update', 'PostController@update');
Route::get('posts/{id}/delete', 'PostController@destroy');

//Route::get('posts', 'PostController@index');
//Route::get('post/{id}', 'PostController@show');
//
//Route::get('posts/create', 'PostController@create');
