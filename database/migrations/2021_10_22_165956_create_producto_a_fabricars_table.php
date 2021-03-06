<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoAFabricarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_a_fabricars', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('estado')->default('En proceso');

            //relaciones
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->unsignedBigInteger('orden_trabajo_id');
            $table->unsignedBigInteger('id_responsable');

            $table->foreign('orden_trabajo_id')->references('id')->on('orden_trabajos')->onDelete('cascade');
            $table->foreign('id_responsable')->references('id')->on('responsables')->onDelete('cascade');
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
        Schema::dropIfExists('producto_a_fabricars');
    }
}
