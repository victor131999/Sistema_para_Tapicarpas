<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_compras', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->float('bienes_servicios_sinIva_fac');
            $table->float('bienes_conIva_fac');
            $table->float('servicios_conIva_fac');
            $table->float('total_fac');
            $table->date('fecha_fac');
            $table->string('descripcion_fac');
            $table->unsignedBigInteger('id_prov')->nullable();
            $table->unsignedBigInteger('id_resp')->nullable();

            $table->foreign('id_prov')->references('id')->on('proveedors')->onDelete('set null');
            $table->foreign('id_resp')->references('id')->on('responsables')->onDelete('set null');
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
        Schema::dropIfExists('factura_compras');
    }
}
