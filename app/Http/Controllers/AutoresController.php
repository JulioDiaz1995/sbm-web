<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Categoria;
use App\Materia;

class AutoresController extends Controller
{
    public function nuevoautor()
    {
        return view('nuevoautor');
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
            'descripcion_autor' => 'required|string|max:150',
        ]);
    }


    public function guardarautor(Request $request)
    {
        $autor = new Author();
        $autor->descripcion_autor = $request->input('descripcion_autor');
        $autor->save();
        return redirect()->route('nuevolibro');
    }
}
