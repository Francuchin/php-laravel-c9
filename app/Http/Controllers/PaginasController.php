<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Participacion;
use App\Challenge;
use App\User;
use DB;
class PaginasController extends Controller
{
    public function index(){
    	// aca usaste para arreglar todo lo inarreglable-->  composer dump-autoload
        if (Session::has('user_id')) {
        	$items = Challenge::where('id_user', '!=', Session::get('user_id'))->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->get();
        	//$items = User::find(Session::get('user_id'))->challenges; //falta ordenar
            return view('principal')->with('items', $items);
        }else{
            return view('login');
        }
    }
    public function visitarPerfil($id){
        $user = User::find($id);
        if ($user!=null && Session::has('user_id')) {
            return view('user.profile')->with('profile',$user);
        }else{
            return redirect('/');
        }
    }
    public function misDesafios(){
    	if (Session::has('user_id')) {
        	//$items = Challenge::where('id_user', '=', Session::get('user_id'))->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->get();
            //$items = Session::get('user')->challenges;
        	 return view('user.profile')->with('profile',Session::get('user'));
        }else{
            return redirect('/');
        }
    }

    public function x(){
       dd(Challenge::find(23)->userParticipa(2)->get());
    }

}
