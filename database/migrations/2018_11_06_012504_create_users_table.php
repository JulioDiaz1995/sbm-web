<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_usuario','13')->unique();
            $table->string('nombre_completo','100');
            $table->string('name','25')->unique();
            $table->string('email','150')->unique();
            $table->string('password','100');
            $table->integer('rol_id')->unsigned();
            $table->string('imagen_user')->nullable();



            $table->integer('carrera_id')->nullable()->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carrers');
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
