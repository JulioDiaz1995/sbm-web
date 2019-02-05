<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;
use App\Book;
use App\Autor;
use App\Category;
use App\Materia;

class CategoriasController extends Controller
{
    public function nuevacategoria()
    {
        return view('nuevacategoria');
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
            'descripcion_categoria' => 'required|string|max:150',
            'imagen_categoria' => 'required',
        ]);
    }


    public function guardarcategoria(Request $request)
    {
        $foto = $_FILES["imagen_categoria"]["name"];
        $ruta = $_FILES["imagen_categoria"]["tmp_name"];
        $destino = "images/categorias/".$foto;
        copy($ruta, $destino);

        $categoria = new categories();
        $categoria->descripcion_categoria = $request->input('descripcion_categoria');
        $categoria->imagen_categoria = $foto;
        $categoria->save();
        return redirect()->route('nuevolibro');
    }
}
