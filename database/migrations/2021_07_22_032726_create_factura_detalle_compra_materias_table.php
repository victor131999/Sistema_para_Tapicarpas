<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaDetalleCompraMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_detalle_compra_materias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('cantidad_df');
            $table->float('costoU_df');
            $table->float('subtotal_df');
            //relaciones
            $table->unsignedBigInteger('id_fac')->nullable();
            $table->foreign('id_fac')->references('id')->on('factura_compras')->onDelete('cascade');
            $table->unsignedBigInteger('id_mp')->nullable();
            $table->foreign('id_mp')->references('id')->on('materia_primas')->onDelete('cascade');
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
        Schema::dropIfExists('factura_detalle_compra_materias');
    }
}
