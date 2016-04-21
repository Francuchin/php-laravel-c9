<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Challenge;
class PaginasController extends Controller
{
    public function index(){
        if (Session::has('user_id')) {
        	$items = Challenge::where('id_user', '=', Session::get('user_id'))->take(10)->get();
        	//dd($items);
            return view('principal')->with('items', $items);
        }else{
            return view('login');
        }
    }
}
