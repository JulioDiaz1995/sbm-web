<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;

class ModelCategoryController extends Controller
{

    public function index()
    {   //para que retorne todos los libros

        return json_encode(array("items"=>categories::all()));

    }

    public function store(Request $request)
    { //validaciones
        $this->validate($request,[
            'descripcion_categoria'=> 'required|string',
            'imagen_categoria'=> 'required|string'
        ]);
        categories::create($request->all());
        return response()->json([
            'message' => 'Categoria  registrada con éxito'], 201);
    }

    public function show($id)
    {
        //muestra un libro en específico
        return categories::find($id);
    }


    public function update(Request $request, $id)
    {
        $categories = categories::findOrFail($id);
        $categories->update($request->all());

    }

    public function destroy(Request $request, $id)
    {
        $categories = categories::findOnFail($id);
        $categories->destroy();

        return 204;
    }
    
}
