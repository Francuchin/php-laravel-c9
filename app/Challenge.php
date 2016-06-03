<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Challenge extends Model
{
    protected $table = 'challenges';
    protected $fillable = ['title','video','poster','description', 'id_user'];
    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    public function participacions(){
        return $this->hasMany('App\Participacion','id_challenge','id');
    }
    //devulve true o false si un usuario participa o no en un desafio
    public function userParticipa($id_user){
    	return (sizeof($this	->hasMany('App\Participacion','id_challenge','id' )
            	->where('participacions.id_user','=',$id_user)->get()) == 1);
    }
    public function imagen(){
        return DB::table('img_challenges','id_challenge','id')->get();
    }
}
