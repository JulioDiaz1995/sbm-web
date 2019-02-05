<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserved extends Model
{
    protected $fillable = [
        'fecha_salida', 'fecha_entrada', 'id_usuario', 'id_autor', 'id_libro',
    ];


    public function users(){
    return $this
        ->belongsTo('App\User')//varias reservaciones pueden tener un usuario(de muchos a uno)
        ->withTimestamps();
}
    public function books(){
        return $this
            ->belongsToMany('App\Book')//varias reservaciones pueden tener varios libros(de muchos a muchos)
            ->withTimestamps();
    }

}
