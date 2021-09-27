<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHpProductoFabricarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hp_producto_fabricars', function (Blueprint $table) {
            $table->id();
            $table->float('cantidad');
            $table->timestamps();

            //relaciones
            $table->unsignedBigInteger('id_materia_prima')->nullable();
            $table->unsignedBigInteger('id_producto_a_fabricar')->nullable();

            $table->foreign('id_materia_prima')->references('id')->on('materia_primas')->onDelete('set null');
            $table->foreign('id_producto_a_fabricar')->references('id')->on('producto_a_fabricars')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hp_producto_fabricars');
    }
}
