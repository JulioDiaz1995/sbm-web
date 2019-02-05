<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeders extends Seeder
{
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrador';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'Cliente';
        $role->save();
    }
}
