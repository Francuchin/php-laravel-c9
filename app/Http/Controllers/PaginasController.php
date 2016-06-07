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
                })->take(6);

            $random = Challenge::where('id_user', '!=', Session::get('user_id'))->get()->random(6);

            $desafiosSeguidos = collect([]);
            $usersSiguiendo = Session::get('user')->siguiendo();

            foreach ($usersSiguiendo as $usuarioSeguido) {
                $des = $usuarioSeguido->challenges()->get();
                $desafiosSeguidos = $desafiosSeguidos->merge($des);
            }
            $participando = Session::get('user')->participaciones()->get();

            return view('principal')
                    ->with('items', $items)
                    ->with('random', $random)
                    ->with('usersSiguiendo', $usersSiguiendo)
                    ->with('participando', $participando)
                    ->with('dasafiosSeguidos', $desafiosSeguidos
                                                ->sortByDesc('id')
                                                ->sortByDesc('created_at')
                                                ->sortByDesc(
                                                    function ($challenge, $key) {
                                                        return $challenge->participacions()->count();
                                                    })
                    );
        }else{
            return view('login');
        }
    }
    public function visitarPerfil($id){
        $user = User::find($id);
        if ($user!=null && Session::has('user_id')) {
            $participando = $user->participaciones()->get();
            $siguiendo = $user->siguiendo();
            $seguidores = $user->seguidores();
            return view('user.profile')->with('profile',$user)->with('participando', $participando)->with('siguiendo', $siguiendo)->with('seguidores', $seguidores);
        }else{
            return redirect('/');
        }
    }

    public function misDesafios(){
    	if (Session::has('user_id')) {
            $participando = Session::get('user')->participaciones()->get();
            $siguiendo = Session::get('user')->siguiendo();
            $seguidores = Session::get('user')->seguidores();
        	return view('user.profile')->with('profile',Session::get('user'))->with('participando', $participando)->with('siguiendo', $siguiendo)->with('seguidores', $seguidores);
        }else{
            return redirect('/');
        }
    }

    public function x(){
        DB::enableQueryLog();
        echo "<pre>";
        var_dump(Participacion::find(2)->imagen());
    }
    
}
