<?php
use App\Role;
use App\User;
use App\Carrers;
use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{


        public function run()
    {
        $carrera_id = Carrers::select('id')->where('nombre_carrera', 'Ingeniería Agroindustrial')->first();
        $role_user = Role::select('id')->where('name', 'user')->first();
        $role_admin = Role::select('id')->where('name', 'admin')->first();

        $user = new User();
        $user->cod_usuario = '20142530027';
        $user->nombre_completo = 'Ana Lucia Espinal Ardón';
        $user->name = 'User';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->carrera_id = 1;
        $user->rol_id = $role_user->id;
        $user->save();


        $user = new User();
        $user->cod_usuario = '1234rgtg';
        $user->nombre_completo = 'Lucy Ramos';
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->carrera_id = 1;
        $user->rol_id = $role_admin->id;
        $user->save();

    }


}
