<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
     protected $table = 'participacions';
     protected $fillable = ['titulo','video','descripcion'];
     public function challenge(){
         return $this->hasOne('App\Challenge');
         }
     public function user(){
         return $this->hasOne('App\User');
         }
}
