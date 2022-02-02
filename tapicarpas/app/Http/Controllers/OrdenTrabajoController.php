<?php

namespace App\Http\Controllers;

use App\Models\orden_trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\hp_orden_trabajo_mano;
use App\Models\hp_orden_trabajo_materia;
use App\Models\materia_prima;
use App\Models\tipo_materia_primas;
use App\Models\mano_de_obra;
use App\Models\Responsable;
use App\Models\cliente;
use App\Models\subcategoria_producto;
use DB;
use Log;

class OrdenTrabajoController extends Controller
{
    protected $fillable = ['id_tipo','cliente_id'];
    //realacion de uno a muchos
    public function tipos(){
        return $this->belongsTo('App\Models\tipo_materia_primas','id_tipo');
    }
    //realacion de uno a muchos
    public function nombre_cliente(){
        return $this->belongsTo('App\Models\cliente','cliente_id');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $datos['orden_trabajos']=orden_trabajo::orderBy('id','DESC')->paginate(10);
        return view('orden_trabajo.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datostipo['tipo_materia_primas']=tipo_materia_primas::all();
        $materia_prima['materia_prima']=materia_prima::all();
        $mano_de_obra['mano_de_obra']=mano_de_obra::all();
        $datosSubcategoria['subcategoria']=subcategoria_producto::all();
        $datosResponsable['responsable']=Responsable::all();
        $datosCliente['cliente']=cliente::all();
        return View::make('orden_trabajo.create' )->
        with($datosSubcategoria)->
        with($datosResponsable)->
        with($mano_de_obra)->
        with($datosCliente)->
        with($materia_prima)->
        with($datostipo);
    }

    public function store(Request $request)
    {
        $campos=[
            'cantidad_producto' =>'numeric|min:0|nullable',
            'nombre'=>'required|string|max:100',
            'color'=>'required|string|max:100',
            'medida'=>'required',
            'material'=>'required|string|max:100',
            'id_s_categoria'=>'numeric|min:0|nullable',
            'id_responsable'=>'numeric|min:0|nullable',
            'cliente_id'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];
        $this->validate($request, $campos, $mensaje);
        $input  = $request->all();
        //dd($input);
        try{
            DB::beginTransaction();
            $ordenTrabajo = orden_trabajo::create([
                "cliente_id"=>$input["cliente_id"],
                "cantidad_producto"=>$input["cantidad_producto"],
                "nombre" =>$input["nombre" ],
                "color" => $input["color"],
                "medida"=>$input["medida"],
                "material"=>$input["material"],
                "id_s_categoria"=>$input["id_s_categoria"],
                "id_responsable"=>$input["id_responsable"],
                "total_pf"=> $input["total_pf"],
                "c_agua" =>$input["c_agua" ],
                "c_luz" =>$input["c_luz"],
                "c_varios"=>$input["c_varios"],
                "c_admin" => $input["c_admin"],
                "c_imprevistos"=>$input["c_imprevistos"],
                "c_total"=>$input["c_total"],
                "c_utilidad"=>$input["c_utilidad"],
                "c_iva"=>$input["c_iva"],
                "total"=>$input["total"],
            ]);
            foreach($input["insumos_id"] as $key =>$value ){
                    hp_orden_trabajo_materia::create([
                        'materia_prima_id'=> $value,
                        'orden_trabajo_id'=> $ordenTrabajo->id,
                        'cantidad'=>$input["cantidadeses"][$key],
                    ]);
            }
            foreach($input["mano_id"] as $key =>$value ){
                hp_orden_trabajo_mano::create([
                    'mano_de_obra_id'=> $value,
                    'horas'=>$input["horas"][$key],
                    'horas_costo'=>$input["costos"][$key],
                    'orden_trabajo_id'=> $ordenTrabajo->id,
                ]);

            }
            DB::commit();
            return redirect("orden_trabajo")->with('status','1');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("orden_trabajo")->with('status',$e->getMessage());
        }
    }

   /* public function calcular_total(orden_trabajo $data){
        $suma = 0;
        foreach ($data->hp_orden_trabajo_mano as $menu) {
           $suma+= $menu->precio_hora;
       }
        return $suma;
    }*/



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orden_trabajo  $orden_trabajo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datos=orden_trabajo::find($id);
        $data[]= $datos->hp_orden_trabajo_materia;
        $dataMano[]= $datos->hp_orden_trabajo_mano;

        //$data1[]= $datos->hp_orden_trabajo_mano;
        return View::make('orden_trabajo.show', compact('data','datos','dataMano'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orden_trabajo  $orden_trabajo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orden_trabajo =orden_trabajo::findOrFail($id);
        $mano_de_obra['mano_de_obra']=mano_de_obra::all();
        if ($orden_trabajo) {
            $valor['valor'] = $orden_trabajo->hp_orden_trabajo_mano;
        }
        $materia_prima['materia_prima']=materia_prima::all();
        $datosSubcategoria['subcategoria']=subcategoria_producto::all();
        $datosResponsable['responsable']=Responsable::all();
        return View::make('orden_trabajo.edit',compact('orden_trabajo'))->with($valor)->with($datosSubcategoria)->with($datosResponsable)->with($materia_prima)->with($mano_de_obra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orden_trabajo  $orden_trabajo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación de datos
        $campos=[
            'nombre'=>'required|string|max:100',
            'color'=>'required|string|max:100',
            'medida'=>'required|string|max:10000',
            'material'=>'required|string|max:100',
            'id_s_categoria'=>'numeric|min:0|nullable',
            'id_responsable'=>'numeric|min:0|nullable',

            'c_agua'=>'numeric|min:0|nullable',
            'c_luz'=>'numeric|min:0|nullable',
            'c_varios'=>'numeric|min:0|nullable',
            'c_admin'=>'numeric|min:0|nullable',
            'c_imprevistos'=>'numeric|min:0|nullable',
            'c_total'=>'numeric|min:0|nullable',
            'c_utilidad'=>'numeric|min:0|nullable',
            'c_iva'=>'numeric|min:0|nullable',
            'total'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        DB::beginTransaction();
        $datosorden_trabajo = request()->except(['_token','_method','insumo_id','cantidades','costosUnitarios','materias']);
        orden_trabajo::where('id','=',$id)->update($datosorden_trabajo);
        DB::commit();
        $orden_trabajo=orden_trabajo::findOrFail($id);
        $input  = $request->all();
        try{
            DB::beginTransaction();
            foreach ($orden_trabajo->hp_orden_trabajo_materia as $role) {
                $materia_prima=materia_prima::findOrFail($role->pivot->materia_prima_id);
                $stockMateriaPrima = $materia_prima->cantidad_mp + $role->pivot->cantidad;
                materia_prima::where('id','=',$role->pivot->materia_prima_id)->update(['cantidad_mp'=>$stockMateriaPrima]);
            }
            hp_orden_trabajo_materia::where('orden_trabajo_id', $id)->delete();
            foreach($input["insumo_id"] as $key =>$value ){
                hp_orden_trabajo_materia::create([
                    'materia_prima_id'=> $value,
                    'orden_trabajo_id'=> $orden_trabajo->id,
                    'cantidad'=>$input["cantidades"][$key],
                ]);
                $materia_prima=materia_prima::findOrFail($value);
            }
            DB::commit();
            return redirect('orden_trabajo')->with('mensaje','Orden de produccion modificado correctamente');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("orden_trabajo")->with('status',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orden_trabajo  $orden_trabajo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orden_trabajo=orden_trabajo::findOrFail($id);
        orden_trabajo::destroy($id);
        return redirect('orden_trabajo')->with('mensaje','Orden de trabajo eliminado');
    }
}
