<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHerramientasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herramientas', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('marca');
            $table->string('modelo');
            $table->float('costo');
            $table->integer('codA');
            $table->integer('codC');
            $table->integer('codF');
            $table->integer('codI');
            $table->timestamps();

            //Relaciones
            $table->unsignedBigInteger('id_area');
            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade');

            $table->unsignedBigInteger('id_clase');
            $table->foreign('id_clase')->references('id')->on('clases')->onDelete('cascade');

            $table->unsignedBigInteger('id_familia');
            $table->foreign('id_familia')->references('id')->on('familias')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('herramientas');
    }
}
