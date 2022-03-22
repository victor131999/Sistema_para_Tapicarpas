<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHpProductoFinalizadoMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hp_producto_finalizado_materias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('cantidad');
            $table->timestamps();

            //relaciones
            $table->unsignedBigInteger('materia_prima_id')->nullable();
            $table->unsignedBigInteger('producto_finalizado_id')->nullable();

            $table->foreign('materia_prima_id')->references('id')->on('materia_primas')->onDelete('cascade');
            $table->foreign('producto_finalizado_id')->references('id')->on('producto_finalizados')->onDelete('cascade');
       

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hp_producto_finalizado_materias');
    }
}
