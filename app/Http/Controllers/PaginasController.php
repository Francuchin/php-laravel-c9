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
        	$items = Challenge::where('id_user', '!=', Session::get('user_id'))->get()->sortByDesc(function ($challenge, $key) {
                    return $challenge->participacions()->count();
                })->take(3);
            $desafiosSeguidos = collect([]);
            $usersSiguiendo = Session::get('user')->siguiendo();
            foreach ($usersSiguiendo as $usuarioSeguido) {
                $des = $usuarioSeguido->challenges()->get();
                $desafiosSeguidos = $desafiosSeguidos->merge($des);
            }
        	//$items = User::find(Session::get('user_id'))->challenges;
            return view('principal')
                    ->with('items', $items)
                    ->with('dasafiosSeguidos', $desafiosSeguidos
                                                ->sortBy('id')
                                                ->sortBy('created_at')
                    );
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
        	 return view('user.profile')->with('profile',Session::get('user'));
        }else{
            return redirect('/');
        }
    }

    public function x(){
        DB::enableQueryLog();
        echo "<pre>";
        var_dump(User::find(1)->imagenesPortada());
        var_dump(DB::getQueryLog());//Challenge::find(21)->imagen());
    }

}
