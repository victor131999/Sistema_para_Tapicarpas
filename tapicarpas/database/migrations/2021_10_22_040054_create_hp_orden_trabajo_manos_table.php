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
            $table->timestamps();

            //relaciones
            $table->unsignedBigInteger('mano_obra_id')->nullable();

            $table->foreign('mano_obra_id')->references('id')->on('mano_de_obras')->onDelete('set null');
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
