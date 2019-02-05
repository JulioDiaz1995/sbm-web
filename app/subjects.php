<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    protected $fillable =['id', 'descripcion_materia', 'imagen_materias'];


    public function books(){
        return $this
            ->belongsToMany('App\Book')
            ->withTimestamps();
    }
}
