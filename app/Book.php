<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =['portada','titulo','cod_dewey','cod_cutter','cod_isbn','id_usuario','id_autor',
        'id_categoria','id_materia', ];


    public function authors(){
        return $this
            ->belongsToMany('App\author')
            ->withTimestamps();

    }
    public function category(){
        return $this
            ->belongsToMany('App\categories')
            ->withTimestamps();
    }
    public  function subject(){
        return $this
            ->belongsToMany('App\subjects')
            ->withTimestamps();
    }
    public function reserveds(){
        return $this
            ->belongsToMany('App\Reserved')//varios libros tienen varias reservaciones(de muchos a muchos)
            ->withTimestamps();
    }
}

