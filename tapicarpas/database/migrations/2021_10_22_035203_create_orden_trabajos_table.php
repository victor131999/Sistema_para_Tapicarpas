<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('color');
            $table->string('medida');
            $table->string('material');
            $table->float('total_pf');

            $table->float('c_agua');
            $table->float('c_luz');
            $table->float('c_varios');
            $table->float('c_admin');
            $table->float('c_imprevistos');
            $table->float('c_total');
            $table->float('c_utilidad');
            $table->float('c_iva');
            $table->float('total');
            //relaciones
            $table->unsignedBigInteger('id_s_categoria');
            $table->unsignedBigInteger('id_responsable');
            $table->unsignedBigInteger('cliente_id');

            $table->foreign('id_s_categoria')->references('id')->on('subcategoria_productos')->onDelete('cascade');
            $table->foreign('id_responsable')->references('id')->on('responsables')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

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
        Schema::dropIfExists('orden_trabajos');
    }
}
