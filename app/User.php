<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'email'];
    protected $guarded = ['id', 'password'];
    
    public function full_name(){
    	return $this->first_name.' '.$this->last_name;
    }
    public function challenges(){
        return $this->hasMany('App\Challenge','id_user','id');
    }
}
