<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrersTable extends Migration
{

    public function up()
    {
        Schema::create('carrers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_carrera','100');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('carrers');
    }
}
