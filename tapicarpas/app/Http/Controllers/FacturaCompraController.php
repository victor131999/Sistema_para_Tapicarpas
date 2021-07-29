<?php

namespace App\Http\Controllers;

use App\Models\facturaCompra;
use App\Models\Proveedor;
use App\Models\Responsable;
use App\Models\materia_prima;
use App\Models\material_reventa;
use App\Models\factura_detalle_compra_materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Log;
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
        $materia_prima['materia_prima']=materia_prima::all();
        $material_reventa['material_reventa']=material_reventa::all();

        return View::make('facturacompra.create')->
        with($datosproveedor)->
        with($datosresponsable)->
        with($materia_prima)->
        with($material_reventa);

    }
    public function store(Request $request)
    {
        $input  = $request->all();
        //dd($input);
        try{
            DB::beginTransaction();
            $factura = facturaCompra::create([
                "bienes_servicios_sinIva_fac" =>$input["bienes_servicios_sinIva_fac" ],
                "bienes_conIva_fac" =>$input["bienes_conIva_fac"],
                "servicios_conIva_fac"=>$input["servicios_conIva_fac"],
                "total_fac"=>$this->calcular_total($input["total_fac"],$input["bienes_servicios_sinIva_fac" ],$input["bienes_conIva_fac"],$input["servicios_conIva_fac"]),
                "descripcion_fac"=>$input["descripcion_fac"],
                "id_prov"=>$input["id_prov"],
                "id_resp"=>$input["id_resp"]
            ]);
        foreach($input["insumo_id"] as $key =>$value ){
            factura_detalle_compra_materia::create([
                'id_mp'=> $value,
                'id_fac'=> $factura->id,
                'cantidad_df'=>$input["cantidades"][$key],
                'costoU_df'=>$input["costos"][$key],
                'subtotal_df'=>$this->calcular_subtotal($input["costos"][$key],$input["cantidades"][$key])
            ]);
        }
        DB::commit();
        return redirect("facturacompra")->with('status','1');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("facturacompra")->with('status',$e->getMessage());
        }
    }
    public function calcular_total($subtotalD ,$bs_sinIva,$B_conIva,$sconiva){
        $total = $subtotalD + $bs_sinIva+$B_conIva +$sconiva;
        return $total;
    }
    public function calcular_subtotal($costo ,$cantidad){
        $subtotal = $costo * $cantidad;
        return $subtotal;
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
        $datosproveedor['proveedor']=Proveedor::all();
        $datosresponsable['responsable']=Responsable::all();
        $facturacompra =facturaCompra::findOrFail($id);
        $responsable =Responsable::findOrFail($facturacompra->responsable->id);
        $proveedor =Proveedor::findOrFail($facturacompra->proveedor->id);
        return View::make('facturacompra.edit')->with('facturacompra', $facturacompra)->
        with('responsable', $responsable)->
        with('proveedor', $proveedor)->
        with($datosproveedor)->
        with($datosresponsable)
        ;
        //return view('facturacompra.edit',compact('facturacompra','responsable','proveedor'),);
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

        facturaCompra::where('id','=',$id)->update($datosfacturacompra);
        $facturacompra=facturaCompra::findOrFail($id);
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
        facturaCompra::destroy($id);
        return redirect('facturacompra')->with('mensaje','Materia prima eliminada');
    }
}
