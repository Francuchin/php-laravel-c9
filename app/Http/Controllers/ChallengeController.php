<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Challenge;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Input::all());
        return view('challenge.success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('user_id')) {
            return view('challenge.new');
        }else{
            return view('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {          
        (Input::get('title'))? $title = Input::get('title') : $title = "null";
        (Input::get('comentario'))? $comentario = Input::get('comentario') : $comentario = "null";
        (Input::get('video'))? $video = Input::get('video') : $video = "null";
        (Input::get('captura'))? $captura = Input::get('captura') : $captura = "null";

          $Challenge = new Challenge;
          $Challenge->title = $title;
          $Challenge->description = $comentario;
          $Challenge->video = $video;
          $Challenge->poster = $captura;
          $Challenge->id_user =  Session::get('user_id');
          $Challenge->save();
          $id = $Challenge->id;
          return Redirect::to('challenge/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Challenge::find($id);
    }
    public function ver($id){
        $challenge = Challenge::find($id);
        if($challenge == null){
           return Redirect::to('/challenge/create');
        }
        return view('challenge.show')->with('challenge', $challenge);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
