<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenge';
    protected $fillable = ['description', 'id_user'];
    protected $guarded = ['id'];

    public function user(){
        return $this->hasOne('App\User');
    }
}
