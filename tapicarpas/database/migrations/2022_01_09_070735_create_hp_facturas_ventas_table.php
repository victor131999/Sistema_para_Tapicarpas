<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHpFacturasVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hp_facturas_ventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_finalizado_id')->nullable();
            $table->unsignedBigInteger('facturas_venta_id')->nullable();
            $table->foreign('producto_finalizado_id')->references('id')->on('producto_finalizados')->onDelete('set null');
            $table->foreign('facturas_venta_id')->references('id')->on('facturas_ventas')->onDelete('set null');
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
        Schema::dropIfExists('hp_facturas_ventas');
    }
}
