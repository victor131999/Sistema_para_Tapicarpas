<?php

namespace App\Http\Controllers;

use App\Models\facturaCompra;
use App\Models\Proveedor;
use App\Models\Responsable;
use App\Models\materia_prima;
use App\Models\factura_detalle_compra_materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Log;
class FacturaCompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $datos['facturacompras']=facturaCompra::paginate(5);
        return view('facturacompra.index',$datos,);
    }
    public function create()
    {
        $detalles = [];
        $datosproveedor['proveedor']=Proveedor::all();
        $datosresponsable['responsable']=Responsable::all();
        $materia_prima['materia_prima']=materia_prima::all();

        return View::make('facturacompra.create',compact("detalles") )->
        with($datosproveedor)->
        with($datosresponsable)->
        with($materia_prima);

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
                "subtotal_fac" => $input["total_fac"],
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

    public function show($id)
    {
        $detalles = [];
        if ($id) {
            
            $detalles = factura_detalle_compra_materia::select("materia_primas.nombre_mp as mp", "factura_detalle_compra_materias.*" )
            ->join("materia_primas","materia_primas.id", "=","factura_detalle_compra_materias.id_mp")
            ->where("factura_detalle_compra_materias.id_fac",$id)
            ->get();
        }
        $facturas  = facturaCompra::select("factura_compras.*", "responsables.Nombre as responsables","proveedors.Nombre as po")
        ->join("responsables","responsables.id","=","factura_compras.id_resp")->join("proveedors","proveedors.id","=","factura_compras.id_prov")
        ->where("factura_compras.id",$id)->get();
        return view('facturacompra.show', compact("facturas", "detalles"));

    }
    public function edit($id)
    {
        $facturacompra =facturaCompra::findOrFail($id);
        
        $detalles = [];
        //dd($detalles);
        if ($id) {
            
            $detalles = factura_detalle_compra_materia::select("materia_primas.nombre_mp as mp", "factura_detalle_compra_materias.*" )
            ->join("materia_primas","materia_primas.id", "=","factura_detalle_compra_materias.id_mp")
            ->where("factura_detalle_compra_materias.id_fac",$id)
            ->get();
        }
        $datosproveedor['proveedor']=Proveedor::all();
        $datosresponsable['responsable']=Responsable::all();
        $materia_prima['materia_prima']=materia_prima::all();

        return View::make('facturacompra.edit', compact("facturacompra","detalles"))->
        with($datosproveedor)->
        with($datosresponsable)->
        with($materia_prima);
        }
    public function update(Request $request, $id)
    {
        //Validación de datos
        $input  = $request->all();
        $facturarec = facturaCompra::findOrFail($id);
        
        try{
            DB::beginTransaction();
            $factura = facturaCompra::where('id','=', $facturarec->id)->update([
                "bienes_servicios_sinIva_fac" =>$input["bienes_servicios_sinIva_fac" ],
                "bienes_conIva_fac" =>$input["bienes_conIva_fac"],
                "servicios_conIva_fac"=>$input["servicios_conIva_fac"],
                "subtotal_fac" => $input["total_fac"],
                "total_fac"=>$this->calcular_total($input["total_fac"],$input["bienes_servicios_sinIva_fac" ],$input["bienes_conIva_fac"],$input["servicios_conIva_fac"]),
                "descripcion_fac"=>$input["descripcion_fac"],
                "id_prov"=>$input["id_prov"],
                "id_resp"=>$input["id_resp"]
            ]);
            if ($input['identificador'] ==null) {
                return;
            }else{
                $array = explode ( ',', $input['identificador'] );
                foreach ( $array as $palabra ) {
                    if (intval($palabra)==0 || null) {
                        return;
                    }else{
                        //dd(intval($palabra));
                        DB::table('factura_detalle_compra_materias')->where("id",intval($palabra))->delete();
                    }
                }
            }
            foreach($input["insumo_id"] as $key =>$value){
               DB::table('factura_detalle_compra_materias')
                    ->updateOrInsert(
                        ['id_mp' => $value, 'id_fac' => $facturarec->id],
                        ['cantidad_df' => $input["cantidades"][$key], 'costoU_df'=>$input["costos"][$key], 'subtotal_df'=> $this->calcular_subtotal($input["costos"][$key],$input["cantidades"][$key])]
                );
            }
        DB::commit();
       
        return redirect("facturacompra")->with('status','1');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("facturacompra")->with('status',$e->getMessage());
        }
        //return redirect('facturacompra')->with('mensaje','Materia prima modificada correctamente');
    }
    public function destroy($id)
    {
        DB::table('factura_detalle_compra_materias')->where("id_fac",$id)->delete();
        $facturacompra=facturacompra::findOrFail($id);
        facturaCompra::destroy($id);
        return redirect('facturacompra')->with('mensaje','Factura y registros eliminados');
    }
}
