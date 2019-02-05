<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //relación de muchos a muchos
    //users: es el nombre de la migración
    public function users()
    {
        return $this
            ->hasMany('App\User')//un rol puede tener varios usuarios
            ->withTimestamps();
    }
}
