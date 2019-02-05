<?php

use Illuminate\Database\Seeder;
use App\Book;

class LibbrosTableSeeder extends Seeder
{

    public function run()
    {
       $libros = new Book();
       $libros->portada = "CalculoIntegral.jpg";
       $libros->titulo = "Calculo Integral";
       $libros->cod_isbn = "978-92-95055-02-5";
       $libros->cod_dewey = "510";
       $libros->cod_cutter = "EG635";
       $libros->id_usuario = "2";
       $libros->id_categoria ="1";
       $libros->id_autor ="1";
       $libros->id_materia = "1";
       $libros->descripcion_libro = "El cálculo integral, encuadrado en el cálculo infinitesimal, 
       es una rama de las matemáticas en el proceso de integración o antiderivación. 
       Es muy común en la ingeniería y en la ciencia; 
       se utiliza principalmente para el cálculo de áreas y volúmenes de regiones y sólidos de revolución.";
       $libros->save();

        $libros = new Book();
        $libros->portada = "LibroDeLasReligiones.jpg";
        $libros->titulo = "Libro de las Religiones";
        $libros->cod_isbn = "100-24-91024-00-1";
        $libros->cod_dewey = "430";
        $libros->cod_cutter = "AG455";
        $libros->id_usuario = "2";
        $libros->id_categoria ="2";
        $libros->id_autor ="4";
        $libros->id_materia = "2";
        $libros->descripcion_libro = "Los libros sagrados tienen diferentes formas de presentarse(rollo, códice,
        un único libro, varios tomos, recopilación)";
        $libros->save();


        $libros = new Book();
        $libros->portada = "AnatomiaLibro.jpg";
        $libros->titulo = "Anatomía Clínica";
        $libros->cod_isbn = "100-24-31014-33-1";
        $libros->cod_dewey = "438";
        $libros->cod_cutter = "KG245";
        $libros->id_usuario = "2";
        $libros->id_categoria ="3";
        $libros->id_autor ="5";
        $libros->id_materia = "3";
        $libros->descripcion_libro = "La Anatomía Clínica expone las bases anatómicas para la exploración clínica";
        $libros->save();

        $libros = new Book();
        $libros->portada = "libroFinanzas.jpg";
        $libros->titulo = "Piense y Hágase Rico";
        $libros->cod_isbn = "200-14-31024-33-1";
        $libros->cod_dewey = "738";
        $libros->cod_cutter = "KA255";
        $libros->id_usuario = "2";
        $libros->id_categoria ="4";
        $libros->id_autor ="6";
        $libros->id_materia = "4";
        $libros->descripcion_libro = "Al seguir los consejos de estos libros de finanzas más vendidos, añadirás ceros a tus cuentas bancarias.";
        $libros->save();

    }


}
