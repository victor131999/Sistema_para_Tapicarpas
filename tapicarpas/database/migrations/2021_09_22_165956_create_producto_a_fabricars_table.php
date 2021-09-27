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
            $table->timestamps();

            //relaciones
            $table->unsignedBigInteger('id_categoria')->nullable();
            $table->unsignedBigInteger('id_responsable')->nullable();

            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('set null');
            $table->foreign('id_responsable')->references('id')->on('responsables')->onDelete('set null');
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
