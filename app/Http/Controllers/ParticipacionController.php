<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Participacion;
use App\Challenge;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
class ParticipacionController extends Controller
{
    public function create($id){
       	if(Challenge::find($id) == null)
       		return Redirect::to('/');
		return view('Participacion.new')->with('id_challenge', $id);
    }

    public function store(){
    	if (!Session::has('user_id'))
    	 	return Redirect::to('/');
    	$rules = array(
            'title'    		  => 'required',
            'description'     => 'required',
            'id_challenge'    => 'required|exists:challenges,id'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
           return Redirect::to('/challenge/'.Input::get('id_challenge').'/accepting')
                ->withErrors($validator)
                ->with('id_challenge', Input::get('id_challenge'));
        } else {
    	  $Participacion = new Participacion;
          $Participacion->title = Input::get('title'); 
          $Participacion->description = Input::get('description'); 
          $Participacion->video = Input::get('video');
          $Participacion->id_user =  Session::get('user_id'); 
          $Participacion->id_challenge =  Input::get('id_challenge');
          $Participacion->save();
          $id = $Participacion->id;
         /* if(Input::has('video')){
            DB::table('img_participations')->insert([
              'id_participacion' => $id,
              'img' => Input::get('video')
              ]);
        }*/
          echo $id;
          return Redirect::to('/challenge/'.Input::get('id_challenge'));
        }

    }
}
