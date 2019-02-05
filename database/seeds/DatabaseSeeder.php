<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
         $this->call(RoleTableSeeders::class);
         $this->call(CarrerTableSeeder::class);
         $this->call(UserTableSeeder::class);
         $this->call(CategoriaTableSeeder::class);
         $this->call(MateriasTableSeeder::class);
         $this->call(AutoresTableSeeder::class);
         $this->call(LibbrosTableSeeder::class);

    }
}
