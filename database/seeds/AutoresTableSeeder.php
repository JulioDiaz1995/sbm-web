<?php

use Illuminate\Database\Seeder;
use App\author;

class AutoresTableSeeder extends Seeder
{

    public function run()
    {
        $autor = new author();
        $autor->descripcion_autor="Antonio Rivera";
        $autor->save();

        $autor = new author();
        $autor->descripcion_autor="Josef Chaix";
        $autor->save();

        $autor = new author();
        $autor->descripcion_autor="Acevedo Silva";
        $autor->save();

        $autor = new author();
        $autor->descripcion_autor="Alfonso Ropera";
        $autor->save();

        $autor = new author();
        $autor->descripcion_autor="Juan Francisco Sánchez";
        $autor->save();

        $autor = new author();
        $autor->descripcion_autor="Napoleón Hill";
        $autor->save();
    }
}
