<?php

namespace App\Http\Controllers;

use App\Carrers;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function administarUsuarios(){


        $usuarios = DB::table('users')
            ->join('roles', 'users.rol_id', '=', 'roles.id')
            ->select('users.*', 'roles.description')
            ->get();

        return view('administraciondeusuarios', ['usuario' => $usuarios]);
    }

    public function borrarusuario($id)
    {
        User::destroy($id);
        return redirect('/administraciondeusuarios');
    }

    public function editarusuario($id)
    {
        $users = DB::table('users')->where('users.id', '=', $id)->get();
        $roles = Role::all();
        $carreras = Carrers::all();

        return view('editarusuario', ['usuario' => $users, 'rol' => $roles, 'carrera' => $carreras]);
    }

    //PARA OBTENER LA INFORMACIÓN DEL USUSARIO SEGÚN EL ID
    public function editarusuarioAndroid($id)
    {

        $users = DB::table('users')->where('users.id', $id)
            ->join('carrers', 'users.carrera_id', '=', 'carrers.id')
            ->select('nombre_completo', 'name', 'cod_usuario', 'email', 'imagen_user', 'nombre_carrera')
            ->get();

        return json_encode(array("items"=> $users));
    }

    //para actualizar datos del perfil
    public function updateUser(Request $request)
    {
        $this->validate($request,[
            'nombre_completo'=> 'required|string',
            'name'=> 'required|string',
            'cod_usuario'=> 'required|string',
            'email'=> 'required|string|email',
        ]);

        if(isset($request->picture))
        {
            $imagen=$request->picture;
            $nombre=uniqid()."."."png";
            $ruta= $_SERVER['DOCUMENT_ROOT']."/images/Usuario_Perfil/" . $nombre;
            file_put_contents($ruta,base64_decode($imagen));

            User::where('id', $request->id)
                ->update(['nombre_completo' => $request->nombre_completo,
                    'name'=> $request->name,
                    'cod_usuario'=> $request->cod_usuario,
                    'email'=> $request->email,
                    'carrera_id'=> $request->carrera_id,
                    'imagen_user'=>$nombre,]);

        }

        User::where('id', $request->id)
            ->update(['nombre_completo' => $request->nombre_completo,
                'name'=> $request->name,
                'cod_usuario'=> $request->cod_usuario,
                'email'=> $request->email,
                'carrera_id'=> $request->carrera_id,]);

        return response()->json([
            'message' => 'Actualización Exitosa']);



    }


    public function guardareditadousuario(Request $request)
    {
        $usuario = User::findOrFail($request->input('id'));

        $usuario->cod_usuario = $request->input('cod_usuario');
        $usuario->nombre_completo = $request->input('nombre_completo');
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->rol_id = $request->input('rol_id');
        $usuario->carrera_id = $request->input('carrera_id');
        $usuario->save();

        return redirect()->route('administrarUsuarios');
        }

    public function verusuario($id)
    {
        $users = DB::table('users')->where('users.id', '=', $id)
            ->join('roles', 'users.rol_id', '=', 'roles.id')
            ->join('carrers', 'users.carrera_id', '=', 'carrers.id')
            ->select('users.*', 'roles.description', 'carrers.nombre_carrera')
            ->get();

        return view('verusuario', ['user' => $users]);
    }


}


