<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\facturas_venta;
use App\Models\cliente;
use App\Models\producto_finalizado;
use App\Models\orden_trabajo;
use App\Models\hp_facturas_venta;
use Illuminate\Support\Facades\Auth;
use DB;
use Log;
class FacturasVentaController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public static function byProducto($id)
    {
           $pf=producto_finalizado::where('cliente_id',$id)->where('estado','Undelivered')->get();
           $pf->loadMissing('orden.orden_de_trabajo');
            return  $pf;
    }
    public function index()
    {
        $datos['factura_ventas']=facturas_venta::orderBy('id','DESC')->paginate(10);
        return view('factura_venta.index',$datos);
    }
    public function create()
    {
        $datosCliente['cliente']=cliente::all();
        $datosProductosF['producto']=producto_finalizado::all();
        return View::make('factura_venta.create' )->
        with($datosProductosF)->
        with($datosCliente);
    }
    public function store(Request $request)
    {
        $campos=[
            'cliente_id' =>'required|numeric|min:0|nullable',
            'total_pf'=>'required|numeric|min:0|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];
        $this->validate($request, $campos, $mensaje);
        $input  = $request->all();
        try{
            DB::beginTransaction();
            $factura_de_venta = facturas_venta::create([
                "cliente_id"=>$input["cliente_id"],
                "total_fv"=>$input["total_pf"],
            ]);
            foreach($input["insumos_id"] as $key =>$value ){
                    hp_facturas_venta::create([
                        'producto_finalizado_id'=> $value,
                        'facturas_venta_id'=> $factura_de_venta->id,
                    ]);
                    producto_finalizado::where('id','=', $value)->update(['estado' => 'Y_delivered'] );
            }
            DB::commit();
            return redirect("factura_venta")->with('status','1');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("factura_venta")->with('status',$e->getMessage());
        }
    }
    public function show($id)
    {
        $datos=facturas_venta::find($id);
        return View::make('factura_venta.show', compact('datos'));
    }

}
