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
Route::post('subir_video',function(){	

		$validator = Validator::make(Input::all(), array( 'subir_video' =>  'required|mimes:mp4' ) ); 
		if ($validator->fails()){
			return $validator->messages()->toJson();
		}

 		  $video =  Input::file('subir_video');
          $ruta = "videos";
          $extension = $video->getClientOriginalExtension();
          $fileName = md5(rand ( 0 , 1000)).md5(rand ( 0 , 1000)).".".$extension;
          $video->move($ruta, $fileName);
          $ruta = "/".$ruta."/".$fileName;
          $arr = array('resultado' => 'ok', 'ruta' => $ruta);
          return response()->json($arr);
});

Route::post('/user/update','UserController@update');
//Route::get ('challenge/create','ChallengeController@create');
Route::get('challenge/{id}/accepting','ParticipacionController@create');
Route::get('challenge/{id}','ChallengeController@ver');
Route::get('user/logout','UserController@logout');
Route::get('user/signin',function(){return view('signin');});
Route::post('accepting','ParticipacionController@store');
Route::post('user/login','UserController@login');
Route::post('user/showByEmail/{email}','UserController@showByEmail');
Route::resource('user', 'UserController', ['except' => ['create','show','edit','index','update', 'destroy']]);
Route::post ('challenge','ChallengeController@store');
//Route::resource('challenge', 'ChallengeController', ['except' => ['create','show','edit','index','update', 'destroy']]);
Route::get('/{id}','PaginasController@visitarPerfil');
Route::post('user/seguir/{seguido}/{seguidor}', 'UserController@seguir');
Route::post('user/dejar_seguir/{seguido}/{seguidor}', 'UserController@dejar_seguir');

