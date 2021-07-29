<?php

namespace App\Http\Controllers;

use App\Models\factura_detalle_compra_materia;
use App\Models\materia_prima;
use Illuminate\Http\Request;

class FacturaDetalleCompraMateriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }
    public function create()
    {
        $datosmp['materia_primas']=materia_prima::all();
        return view('detallemp.create',$datosmp);
    }
    public function store(Request $request)
    {
        $campos=[
            'bienes_servicios_sinIva_fac'=>'numeric|min:0|nullable',
            'bienes_conIva_fac'=>'numeric|min:0|nullable',
            'servicios_conIva_fac'=>'numeric|min:0|nullable',
            'total_fac'=>'numeric|min:0|nullable',
            'descripcion_fac'=>'required|string|max:100',
            'id_prov'=>'required|string|max:100',
            'id_resp'=>'required|string|max:100',


        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosdacturaCompra = request()->except('_token');


        facturaCompra::insert($datosdacturaCompra);
        return redirect('facturacompra')->with('mensaje','La Factura fue agregada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\factura_detalle_compra_materia  $factura_detalle_compra_materia
     * @return \Illuminate\Http\Response
     */
    public function show(factura_detalle_compra_materia $factura_detalle_compra_materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\factura_detalle_compra_materia  $factura_detalle_compra_materia
     * @return \Illuminate\Http\Response
     */
    public function edit(factura_detalle_compra_materia $factura_detalle_compra_materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\factura_detalle_compra_materia  $factura_detalle_compra_materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, factura_detalle_compra_materia $factura_detalle_compra_materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\factura_detalle_compra_materia  $factura_detalle_compra_materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(factura_detalle_compra_materia $factura_detalle_compra_materia)
    {
        //
    }
}
