<?php

namespace App\Http\Controllers;

use App\Models\facturaCompra;
use App\Models\Proveedor;
use App\Models\Responsable;
use Illuminate\Http\Request;

class FacturaCompraController extends Controller
{
    //Colocamos el middleware
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['facturacompras']=facturaCompra::paginate(5);
        return view('facturacompra.index',$datos,);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datosproveedor['proveedor']=Proveedor::all();
        $datosresponsable['responsable']=Responsable::all();
        return view('facturacompra.create',$datosproveedor,$datosresponsable);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validación de datos
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


        facturacompra::insert($datosdacturaCompra);
        return redirect('facturacompra')->with('mensaje','La Factura fue agregada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\facturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function show(facturaCompra $facturaCompra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\facturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                //
        $facturacompra =facturaCompra::findOrFail($id);
        $responsable =Responsable::findOrFail($id);
        $proveedor =Proveedor::findOrFail($id);
        return view('facturacompra.edit',compact('facturacompra','responsable','proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\facturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación de datos
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

        $datosfacturacompra = request()->except(['_token','_method']);

        FacturaCompra::where('id','=',$id)->update($datosfacturacompra);
        $facturacompra=FacturaCompra::findOrFail($id);
        return redirect('facturacompra')->with('mensaje','Materia prima modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\facturaCompra  $facturaCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //se esta recepcionando el id del formulario del index
        $facturacompra=facturacompra::findOrFail($id);
        facturacompra::destroy($id);
        return redirect('facturacompra')->with('mensaje','Materia prima eliminada');
    }
}
