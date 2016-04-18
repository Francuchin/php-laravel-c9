<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'email'];
    protected $guarded = ['id', 'password'];
    public function challenges(){
        return $this->belongsToMany('App\Challenge');
    }
}
