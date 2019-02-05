<?php

use Illuminate\Database\Seeder;
use App\subjects;

class MateriasTableSeeder extends Seeder
{

    public function run()
    {
        $materias = new subjects();
        $materias->descripcion_materia = "Cálculo";
        $materias->imagen_materias = "Calculo.jpg";
        $materias->id_categoria ="1";
        $materias->save();

        $materias = new subjects();
        $materias->descripcion_materia = "Religiones";
        $materias->imagen_materias = "Religiones.jpg";
        $materias->id_categoria ="2";
        $materias->save();

        $materias = new subjects();
        $materias->descripcion_materia = "Anatomía";
        $materias->imagen_materias = "AnatomiaMedicina.jpg";
        $materias->id_categoria ="3";
        $materias->save();

        $materias = new subjects();
        $materias->descripcion_materia = "Finanzas";
        $materias->imagen_materias = "MateriaFinazas.png";
        $materias->id_categoria ="4";
        $materias->save();
    }


}
