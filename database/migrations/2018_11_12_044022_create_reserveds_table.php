<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserveds', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_salida')->nullable();
            $table->date('fecha_entrada')->nullable();
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_libro')->unsigned();
            $table->integer('id_reserved_status')->unsigned();

            $table->foreign('id_reserved_status')->references('id')->on('reserved_status');
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_libro')->references('id')->on('books');
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
        Schema::dropIfExists('reserveds');
    }
}
