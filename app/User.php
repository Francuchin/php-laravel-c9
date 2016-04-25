<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'email'];
    protected $guarded = ['id', 'password'];
    
    public function full_name(){
    	return $this->first_name.' '.$this->last_name;
    }
    public function challenges($order="created_at", $orderTipe="desc"){
        return $this->hasMany('App\Challenge','id_user','id')->orderBy($order, $orderTipe);
    }

    public function imagenesPerfil(){
        return DB::table('img_users')
                    ->join('users', 'users.id', '=', 'img_users.id_user')
                    ->where('users.id', '=', $this->id)
                    ->where('img_users.tipo', '=', 1)
                    ->orderBy('img_users.created_at','desc')
                    ->orderBy('img_users.id', 'desc')
                    ->get();
    }
    public function imagenPerfil(){
        $listadoPerfil = $this->imagenesPerfil();
        if($listadoPerfil){
            return $listadoPerfil[0]->img;
        }
        return "http://crackberry.com/sites/crackberry.com/files/styles/large/public/topic_images/2013/ANDROID.png";
    }
    public function imagenesPortada(){
        return DB::table('img_users')
                    ->join('users', 'users.id', '=', 'img_users.id_user')
                    ->where('users.id', '=', $this->id)
                    ->where('img_users.tipo', '=', 2)
                    ->orderBy('img_users.created_at','desc')
                    ->orderBy('img_users.id', 'desc')
                    ->get();
    }
    public function imagenPortada(){
        $listadoPortada = $this->imagenesPortada();
        if($listadoPortada){
            return $listadoPortada[0]->img;
        }
        return "https://i.ytimg.com/vi/v6ZmQ39WTZA/maxresdefault.jpg";
    }
}
