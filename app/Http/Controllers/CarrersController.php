<?php

namespace App\Http\Controllers;
use App\Carrers;
use Illuminate\Http\Request;

class CarrersController extends Controller
{
    public function index()
    {
        return json_encode(array("items" => Carrers::all()));
    }

    public function show($id)
    {
        return Carrers::find($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre_carrera' => 'required|string',
        ]);

        Carrers::create($request->all());
        return response()->json([
            'message' => 'Carrera registrada con éxito'], 201);
    }

    public function update(Request $request, $id)
    {
        $carrera = Carrers::findOrFail($id);
        $carrera->update($request->all());

        return $carrera;
    }

    public function delete(Request $request, $id)
    {
        $carrera = Carrers::findOrFail($id);
        $carrera->delete();

        return 204;
    }
}
