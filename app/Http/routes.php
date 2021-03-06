<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','PostController@index');
Route::resource('discussions','PostController');
Route::resource('comment','CommentsController');
Route::get('/users/register','UsersController@register');
Route::get('/users/avatar','UsersController@avatar');
Route::get('/verfiy/{confirm_code}','UsersController@confirmEmail');
Route::post('/users/register','UsersController@store');
Route::get('/users/login','UsersController@login');
Route::get('/users/logout','UsersController@logout');
Route::post('/users/login','UsersController@signin');
Route::post('/avatar','UsersController@changeAvatar');
Route::post('/crop/api','UsersController@cropAvatar');