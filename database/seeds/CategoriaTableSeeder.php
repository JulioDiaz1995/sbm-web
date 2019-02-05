<?php

use Illuminate\Database\Seeder;
use App\categories;

class CategoriaTableSeeder extends Seeder
{

    public function run()
    {
        $categoria = new categories();
        $categoria->descripcion_categoria = 'Matemáticas';
        $categoria->imagen_categoria ='matematicas.jpg';
        $categoria->save();

        $categoria = new categories();
        $categoria->descripcion_categoria = 'Filosofía';
        $categoria->imagen_categoria ='filosofia.jpg';
        $categoria->save();

        $categoria = new categories();
        $categoria->descripcion_categoria = 'Medicina';
        $categoria->imagen_categoria ='medicina.jpg';
        $categoria->save();

        $categoria = new categories();
        $categoria->descripcion_categoria = 'Negocios y Economía';
        $categoria->imagen_categoria ='categoriaEconomiaFinanzas.png';
        $categoria->save();


    }
}
