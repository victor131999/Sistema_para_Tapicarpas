<?php

namespace App\Http\Controllers;

use App\Models\producto_a_fabricar;
use App\Models\hp_producto_fabricar;
use App\Models\materia_prima;
use App\Models\Responsable;
use App\Models\subcategoria_producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Log;

class ProductoAFabricarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $datos['producto_a_fabricars']=producto_a_fabricar::paginate(5);
        return view('producto_a_fabricar.index',$datos);
    }

    public function create()
    {
        $materia_prima['materia_prima']=materia_prima::all();
        $datosSubcategoria['subcategoria']=subcategoria_producto::all();
        $datosResponsable['responsable']=Responsable::all();
        return View::make('producto_a_fabricar.create' )->
        with($datosSubcategoria)->
        with($datosResponsable)->
        with($materia_prima);
    }
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_inicio'=>'required|string|max:100',
            'fecha_fin'=>'required|string|max:100',
            'color'=>'required|string|max:100',
            'medida'=>'required|string|max:100',
            'material'=>'required|string|max:100',
            'id_s_categoria'=>'numeric|min:0|nullable',
            'id_responsable'=>'numeric|min:0|nullable',

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
            $productoAFabricar = producto_a_fabricar::create([
                "nombre" =>$input["nombre" ],
                "fecha_inicio" =>$input["fecha_inicio"],
                "fecha_fin"=>$input["fecha_fin"],
                "color" => $input["color"],
                "medida"=>$input["medida"],
                "material"=>$input["material"],
                "estado"=>$input["estado"],
                "id_s_categoria"=>$input["id_s_categoria"],
                "id_responsable"=>$input["id_responsable"]
            ]);
            foreach($input["insumo_id"] as $key =>$value ){
                    hp_producto_fabricar::create([
                        'materia_prima_id'=> $value,
                        'producto_a_fabricar_id'=> $productoAFabricar->id,
                        'cantidad'=>$input["cantidades"][$key],
                    ]);
                materia_prima::where('id','=', $value)->update(['cantidad_mp' => $input["stocks"][$key]]);

                }
            DB::commit();
            return redirect("producto_a_fabricar")->with('status','1');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("producto_a_fabricar")->with('status',$e->getMessage());
        }
    }
    public function calcular_total(producto_a_fabricar $data){
        $suma = 0;
        foreach ($data->hpProductoFabricar as $menu) {
           $suma+= $menu->costo_unidad_mp;
       }
        return $suma;
    }
    public function show($id)
    {
        $datos=producto_a_fabricar::find($id);
        $data[]= $datos->hpProductoFabricar;
        $total=$this->calcular_total($datos);
        return View::make('producto_a_fabricar.show', compact('data','datos'))->with('total',$total);
    }
    public function edit($id)
    {

        $producto_a_fabricar =producto_a_fabricar::findOrFail($id);
        if ($producto_a_fabricar) {
            $valor['valor'] = $producto_a_fabricar->hpProductoFabricar;
        }
        $materia_prima['materia_prima']=materia_prima::all();
        $datosSubcategoria['subcategoria']=categoria::all();
        $datosResponsable['responsable']=Responsable::all();
        return View::make('producto_a_fabricar.edit',compact('producto_a_fabricar'))->with($valor)->with($datosSubcategoria)->with($datosResponsable)->with($materia_prima);
    }
    public function update(Request $request, $id)
    {
        //Validación de datos
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_inicio'=>'required|string|max:100',
            'fecha_fin'=>'required|string|max:100',
            'color'=>'required|string|max:100',
            'medida'=>'required|string|max:100',
            'material'=>'required|string|max:100',
            'id_s_categoria'=>'numeric|min:0|nullable',
            'id_responsable'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        DB::beginTransaction();
        $datosProducto_a_Fabricar = request()->except(['_token','_method','insumo_id','cantidades','costosUnitarios','materias']);
        producto_a_fabricar::where('id','=',$id)->update($datosProducto_a_Fabricar);
        DB::commit();
        $producto_a_fabricar=producto_a_fabricar::findOrFail($id);
        $input  = $request->all();
        try{
            DB::beginTransaction();
            foreach ($producto_a_fabricar->hpProductoFabricar as $role) {
                $materia_prima=materia_prima::findOrFail($role->pivot->materia_prima_id);
                $stockMateriaPrima = $materia_prima->cantidad_mp + $role->pivot->cantidad;
                materia_prima::where('id','=',$role->pivot->materia_prima_id)->update(['cantidad_mp'=>$stockMateriaPrima]);
            }
            hp_producto_fabricar::where('producto_a_fabricar_id', $id)->delete();
            foreach($input["insumo_id"] as $key =>$value ){
                hp_producto_fabricar::create([
                    'materia_prima_id'=> $value,
                    'producto_a_fabricar_id'=> $producto_a_fabricar->id,
                    'cantidad'=>$input["cantidades"][$key],
                ]);
                $materia_prima=materia_prima::findOrFail($value);
                $stockMateria = $materia_prima->cantidad_mp - $input["cantidades"][$key];
                materia_prima::where('id','=',$value)->update(['cantidad_mp'=>$stockMateria]);
            }
            DB::commit();
            return redirect('producto_a_fabricar')->with('mensaje','Orden de produccion modificado correctamente');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect("producto_a_fabricar")->with('status',$e->getMessage());
        }
    }
    public function destroy($id)
    {
        $producto_a_fabricar=producto_a_fabricar::findOrFail($id);
        producto_a_fabricar::destroy($id);
        return redirect('producto_a_fabricar')->with('mensaje','Producto a fabricar eliminado');
    }
}