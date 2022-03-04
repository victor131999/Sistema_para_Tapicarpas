<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManoObraHasProductoFsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mano_obra_has_producto_fs', function (Blueprint $table) {
            $table->id();
            $table->float('horas');
            $table->float('horas_costo');
            $table->timestamps();


            //relaciones
            $table->unsignedBigInteger('mano_de_obra_id')->nullable();
            $table->unsignedBigInteger('producto_finalizado_id')->nullable();

            $table->foreign('mano_de_obra_id')->references('id')->on('mano_de_obras')->onDelete('cascade');
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
        Schema::dropIfExists('mano_obra_has_producto_fs');
    }
}
