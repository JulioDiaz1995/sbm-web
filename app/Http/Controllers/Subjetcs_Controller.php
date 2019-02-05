<?php

namespace App\Http\Controllers;

use App\subjects;
use Illuminate\Http\Request;

class Subjetcs_Controller extends Controller
{

    public function index()
    {
        return json_encode(array("items"=>subjects::all()));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'descripcion_materia'=>'required|string',
            'imagen_materias'=>'required|string'
        ]);
        subjects::create($request->all());
        return response()->json([
            'message' => 'Materia  registrada con éxito'], 201);
    }

    public function show($id)
    {
        return subjects::find($id);
    }

    public function update(Request $request, $id)
    {
        $subjects = subjects::findOrFail($id);
        $subjects->update($request->all());
    }

    public function destroy($id)
    {
        $subjects = subjects::findOnFail($id);
        $subjects->destroy();

        return 204;
    }

    public function SubjectsCategory($id) {
        $object = subjects::select('id','descripcion_materia','imagen_materias')->where('id_categoria',$id)->get();
        return json_encode(array("items"=>$object));
    }
}
