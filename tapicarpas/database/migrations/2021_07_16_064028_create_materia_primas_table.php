<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaPrimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_primas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_mp');
            $table->string('color_mp');
            $table->float('ancho_mp')->default(0);
            $table->float('largo_mp')->default(0);
            $table->float('otro_mp');
            $table->timestamps();
        //relaciones
        $table->unsignedBigInteger('id_tipo')->nullable();
        $table->foreign('id_tipo')->references('id')->on('tipo_materia_primas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materia_primas');
    }
}
