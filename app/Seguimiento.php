<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimientos';
    protected $fillable = ['id_user_seguidor','id_user_seguido'];
    protected $guarded = ['id'];
    
}
