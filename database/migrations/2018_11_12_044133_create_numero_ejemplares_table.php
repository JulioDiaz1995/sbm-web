<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumeroEjemplaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('numero_ejemplares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('id_libro')->unsigned();
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
        Schema::dropIfExists('numero_ejemplares');
    }
}
