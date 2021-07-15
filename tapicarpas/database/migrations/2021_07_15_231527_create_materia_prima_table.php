<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaPrimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_prima', function (Blueprint $table) {
            $table->bigIncrements('id_mp');
            $table->string('nombre_mp');
            $table->string('color_mp');
            $table->float('ancho_mp');
            $table->float('largo_mp');
            $table->float('otros_mp');
        //relaciones
        $table->unsignedBigInteger('id_tipo')->nullable();
        $table->foreign('id_tipo')->references('id')->on('tipo_materia_prima')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia_prima');
    }
}
