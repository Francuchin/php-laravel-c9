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
}
