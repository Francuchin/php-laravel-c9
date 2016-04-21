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
Route::get('/', 'PaginasController@index');
Route::get('user/signin',function(){
    return view('signin');
});
Route::get('challenges/{id}','ChallengeController@ver');
Route::post('user/login','UserController@login');
Route::get('user/logout','UserController@logout');
Route::post('user/showByEmail/{email}','UserController@showByEmail');
Route::resource('user', 'UserController');
Route::resource('challenge', 'ChallengeController');