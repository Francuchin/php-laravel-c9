<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
     protected $table = 'participacions';
     protected $fillable = ['title','video','poster','description','id_user','id_challenge'];
     public function challenge(){
         return $this->belongsTo('App\Challenge','id_challenge');
         }
     public function user(){
         return $this->belongsTo('App\User','id_user');
         }
    public function imagen(){
        return DB::table('img_participacions','id_participacion','id')->get();
    	}
}
