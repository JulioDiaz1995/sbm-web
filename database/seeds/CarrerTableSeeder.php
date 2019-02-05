<?php

use Illuminate\Database\Seeder;
use App\Carrers;

class CarrerTableSeeder extends Seeder
{

    public function run()
    {

        $carrer = new Carrers();
        $carrer->nombre_carrera = 'Ninguna';
        $carrer->save();

        $carrer = new Carrers();
        $carrer->nombre_carrera = 'Ingeniería Agroindustrial';
        $carrer->save();

        $carrer = new Carrers();
        $carrer->nombre_carrera = 'Licenciatura en Informática Administrativa';
        $carrer->save();

        $carrer = new Carrers();
        $carrer->nombre_carrera = 'Licenciatura en Enfermería';
        $carrer->save();

        $carrer = new Carrers();
        $carrer->nombre_carrera = 'Técnico en Café';
        $carrer->save();




    }
}
