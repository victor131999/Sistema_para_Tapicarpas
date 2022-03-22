<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHpOrdenTrabajoManosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hp_orden_trabajo_manos', function (Blueprint $table) {
            $table->id();
            $table->float('horas');
            $table->float('horas_costo');
            $table->timestamps();

            //relaciones
            $table->unsignedBigInteger('mano_de_obra_id')->nullable();
            $table->unsignedBigInteger('orden_trabajo_id')->nullable();

            $table->foreign('mano_de_obra_id')->references('id')->on('mano_de_obras')->onDelete('cascade');
            $table->foreign('orden_trabajo_id')->references('id')->on('orden_trabajos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hp_orden_trabajo_manos');
    }
}
