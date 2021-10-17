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
            $table->string('nombre');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('color');
            $table->string('medida');
            $table->string('material');
            $table->string('estado');
            $table->float('total_pf');
            $table->timestamps();

            //relaciones
            $table->unsignedBigInteger('id_s_categoria');
            $table->unsignedBigInteger('id_responsable');

            $table->foreign('id_s_categoria')->references('id')->on('subcategoria_productos')->onDelete('cascade');
            $table->foreign('id_responsable')->references('id')->on('responsables')->onDelete('cascade');
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
