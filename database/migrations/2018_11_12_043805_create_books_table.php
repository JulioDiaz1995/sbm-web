<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('portada');
            $table->string('titulo','50');
            $table->string('cod_isbn', '17')->unique();
            $table->string('cod_dewey','17');
            $table->string('cod_cutter', '17');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_categoria')->unsigned();
            $table->integer('id_autor')->unsigned();
            $table->integer('id_materia')->unsigned();
            $table->string('descripcion_libro', '500');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_categoria')->references('id')->on('categories');
            $table->foreign('id_autor')->references('id')->on('authors');
            $table->foreign('id_materia')->references('id')->on('subjects');
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
        Schema::dropIfExists('books');
    }
}
