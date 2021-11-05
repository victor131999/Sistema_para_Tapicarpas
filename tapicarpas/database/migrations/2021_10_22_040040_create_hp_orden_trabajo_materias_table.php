<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHpOrdenTrabajoMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hp_orden_trabajo_materias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('cantidad');
            $table->timestamps();

            //relaciones
            $table->unsignedBigInteger('materia_prima_id')->nullable();
            $table->unsignedBigInteger('orden_trabajo_id')->nullable();

            $table->foreign('materia_prima_id')->references('id')->on('materia_primas')->onDelete('set null');
            $table->foreign('orden_trabajo_id')->references('id')->on('orden_trabajos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hp_orden_trabajo_materias');
    }
}
