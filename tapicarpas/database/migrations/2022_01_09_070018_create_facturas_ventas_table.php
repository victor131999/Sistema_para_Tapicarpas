<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasVentasTable extends Migration
{
    
    public function up()
    {
        Schema::create('facturas_ventas', function (Blueprint $table) {
            $table->id();
            $table->float('total_fv');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('facturas_ventas');
    }
}
