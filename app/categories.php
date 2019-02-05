<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable = ['id', 'descripcion_categoria', 'imagen_categoria'];


    public function books(){
        return $this
            ->belongsToMany('App\Book')
            ->withTimestamps();
    }
}


