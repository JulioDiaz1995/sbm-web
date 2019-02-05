<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class RegisterController extends Controller
{
    protected function create(array $data)
    {
        $user = User::create([
            'nombre_completo' => $data['nombre_completo'],
            'cod_usuario'=> $data['cod_usuario'],
            'name' => $data['name'],
            'email' => $data['email'],
            'rol_id' => 2,
            'carrera_id' => 1,
            'password' => bcrypt($data['password'])

        ]);

        $user
            ->roles()
            ->attach(Role::where('name', 'user')->first());

        return $user;
    }
}
