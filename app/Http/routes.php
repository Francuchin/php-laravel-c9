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
Route::get('/I', 'PaginasController@misDesafios');
//prueba
Route::get('x','PaginasController@x');
Route::get ('challenge/create','ChallengeController@create');
Route::get ('challenge/{id}/accepting','ParticipacionController@create');
Route::get ('challenge/{id}','ChallengeController@ver');
Route::get ('user/logout','UserController@logout');
Route::get ('user/signin',function(){return view('signin');});
Route::post ('accepting','ParticipacionController@store');
Route::post('user/login','UserController@login');
Route::post('user/showByEmail/{email}','UserController@showByEmail');
Route::resource('user', 'UserController', ['except' => ['create','show','edit','index','update', 'destroy']]);
Route::post ('challenge','ChallengeController@store');
//Route::resource('challenge', 'ChallengeController', ['except' => ['create','show','edit','index','update', 'destroy']]);
Route::get('/{id}','PaginasController@visitarPerfil');
Route::post('user/seguir/{seguido}/{seguidor}', 'UserController@seguir');
Route::post('user/dejar_seguir/{seguido}/{seguidor}', 'UserController@dejar_seguir');