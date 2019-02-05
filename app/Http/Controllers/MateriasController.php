<?php

namespace App\Http\Controllers;

use App\categories;
use App\subjects;
use Illuminate\Http\Request;
use App\Autor;
use App\Categoria;

class MateriasController extends Controller
{
    public function nuevamateria()
    {
        $categories = categories::all();

        return view('nuevamateria',['categorie'=>$categories]);
    }


        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'descripcion_materia' => 'required|string|max:150',
            'imagen_materias' => 'required',
            'id_categoria' => 'required',

        ]);
    }


    public function guardarmateria(Request $request)
    {
        $foto = $_FILES["imagen_materias"]["name"];
        $ruta = $_FILES["imagen_materias"]["tmp_name"];
        $destino = "images/materias/".$foto;
        copy($ruta, $destino);

        $materia = new subjects();
        $materia->descripcion_materia = $request->input('descripcion_materia');
        $materia->imagen_materias = $foto;
        $materia->id_categoria = $request->input('id_categoria');
        $materia->save();
        return redirect()->route('nuevolibro');
    }
}
