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
            $table->bigIncrements('id');
            $table->float('cantidad');
            $table->timestamps();

            //relaciones
            $table->unsignedBigInteger('materia_prima_id')->nullable();
            $table->unsignedBigInteger('producto_a_fabricar_id')->nullable();

            $table->foreign('materia_prima_id')->references('id')->on('materia_primas')->onDelete('set null');
            $table->foreign('producto_a_fabricar_id')->references('id')->on('producto_a_fabricars')->onDelete('set null');
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
