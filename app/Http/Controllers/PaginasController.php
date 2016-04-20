<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class PaginasController extends Controller
{
    public function index(){
        if (Session::has('user_id')) {
            return view('principal');
        }else{
            return view('login');
        }
    }
    public function nuevoChallenge(){
    	 if (Session::has('user_id')) {
            return view('challenge.new');
        }else{
            return view('login');
        }
    }
}
