<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoFinalizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_finalizados', function (Blueprint $table) {
            $table->id();
            $table->float('c_agua');
            $table->float('c_luz');
            $table->float('c_varios');
            $table->float('c_admin');
            $table->float('c_imprevistos');
            $table->float('c_total');
            $table->float('c_utilidad');
            $table->float('c_iva');
            $table->float('total');
            $table->string('estado');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->unsignedBigInteger('id_orden');
            $table->foreign('id_orden')->references('id')->on('producto_a_fabricars')->onDelete('cascade');
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
        Schema::dropIfExists('producto_finalizados');
    }
}
