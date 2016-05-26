<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/user/signin')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
          // aca usas Input::get('email'); y esas cosas pa guardar
          $user = new User;
          $user->first_name = Input::get('first_name'); 
          $user->last_name = Input::get('last_name'); 
          $user->email = Input::get('email'); 
          $user->password = md5(Input::get('password')); 
          $user->save();
         // Session::flash('message', 'Usuario creado'); no se que es XD
          Session::put('user_id', $user->id);
          Session::put('user', $user);
          return Redirect::to('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return User::find($id);
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
    
    /*--------------------------------------------*/
    public function showByEmail($email)
    {
        return User::where('email', '=', $email)->first();
    }
    public function login()
    {
         $rules = array(
            'email'         => 'required',
            'password'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('/');
        }
        $email = Input::get('email');
        $password = Input::get('password');
        $user = $this->showByEmail($email);
        if($user==null){
            return Redirect::to('/')->withErrors(array('mensaje' => 'Email no registrado'));
        }else{
            if(md5($password) == $user->password){
                Session::put('user_id', $user->id);
                Session::put('user', $user);
                // dd(session('user_id'));
                // return Redirect::back();
                return Redirect::to('/');
            }else{
                 return Redirect::to('/')->withErrors(array('mensaje' => 'Password invalido'));
            }
        }
    }
    public function logout()
    {
        Session::flush();
        return Redirect::to('/');
    }
}
