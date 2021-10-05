<?php

namespace App\Http\Controllers;

use App\Models\producto_a_fabricar;
use App\Models\hp_producto_fabricar;
use App\Models\materia_prima;
use App\Models\Responsable;
use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use Log;

class ProductoAFabricarController extends Controller
{
    //protected $fillable = ['id_categoria','id_responsable'];
    //realacion de uno a muchos
    /*public function categorias(){
        return $this->belongsTo('App\Models\categoria','id_categoria');
    }

    public function responsables(){
        return $this->belongsTo('App\Models\Responsable','id_responsable');
    }*/

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
        $datos['producto_a_fabricars']=producto_a_fabricar::paginate(5);
        return view('producto_a_fabricar.index',$datos);
    }

    public function create()
    {
        $materia_prima['materia_prima']=materia_prima::all();
        $datosCategoria['categoria']=categoria::all();
        $datosResponsable['responsable']=Responsable::all();
        return View::make('producto_a_fabricar.create' )->
        with($datosCategoria)->
        with($datosResponsable)->
        with($materia_prima);
    }
    public function store(Request $request)
    {
        //Validación de datos
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_inicio'=>'required|string|max:100',
            'fecha_fin'=>'required|string|max:100',
            'color'=>'required|string|max:100',
            'medida'=>'required|string|max:100',
            'material'=>'required|string|max:100',
            'id_categoria'=>'numeric|min:0|nullable',
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
                "id_categoria"=>$input["id_categoria"],
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
        $datosCategoria['categoria']=categoria::all();
        $datosResponsable['responsable']=Responsable::all();
        return View::make('producto_a_fabricar.edit',compact('producto_a_fabricar'))->with($valor)->with($datosCategoria)->with($datosResponsable)->with($materia_prima);
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
            'id_categoria'=>'numeric|min:0|nullable',
            'id_responsable'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProducto_a_Fabricar = request()->except(['_token','_method']);

        producto_a_fabricar::where('id','=',$id)->update($datosProducto_a_Fabricar);
        $producto_a_fabricar=producto_a_fabricar::findOrFail($id);
        return redirect('producto_a_fabricar')->with('mensaje','Producto a fabricar modificado correctamente');
    }
    public function destroy($id)
    {
        $producto_a_fabricar=producto_a_fabricar::findOrFail($id);
        producto_a_fabricar::destroy($id);
        return redirect('producto_a_fabricar')->with('mensaje','Producto a fabricar eliminado');
    }
}
