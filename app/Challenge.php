<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenges';
    protected $fillable = ['title','description', 'id_user'];
    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    public function participacions(){
        return $this->hasMany('App\Participacion','id_challenge','id');
    }
    public function userParticipa($user){
    	return (sizeof($this	->hasMany('App\Participacion','id_challenge','id' )
            	->where('participacions.id_user','=',$user)->get()) == 1);
    }
}
