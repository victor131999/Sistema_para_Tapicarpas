<?php

namespace App\Http\Controllers;

use App\Models\tipo_materia_primas;
use Illuminate\Http\Request;

class TipoMateriaPrimasController extends Controller
{
    //Colocamos el middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $fillable = ['id'];
    //realacion de uno a muchos(inversa)
    public function materia_prima(){
        return $this->hasMany('App\Models\materia_prima');
    }

    public function index()
    {
        //$tipo_materia_prima = tipo_materia_primas::all();
        //return view('tipo.index', compact('tipo_materia_prima'));
         //
         $datos['tipo_materia_primass']=tipo_materia_primas::paginate(5);

         return view('tipo_materia_primas.index',$datos);
    }

    public function create()
    {
        return view('tipo_materia_primas.create');
    }

    public function store(Request $request)
    {
         //
        //Validación de datos
        $campos=[
            'nombre_tipo'=>'required|string|max:100',
            'descripcion_tipo'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);
        $datostipo_materia_primas = request()->except('_token');


        tipo_materia_primas::insert($datostipo_materia_primas);
        return redirect('tipo_materia_primas')->with('mensaje','Tipo de materia agregada con exito');
    }

    public function show(tipo_materia_primas $tipo_materia_primas)
    {
        return view('tipo.show');
    }

    public function edit($id)
    {
         //
         $tipo_materia_primas =tipo_materia_primas::findOrFail($id);
         return view('tipo_materia_primas.edit',compact('tipo_materia_primas'));
    }

    public function update(Request $request, $id)
    {
                //
         //Validación de datos
         $campos=[
            'nombre_tipo'=>'required|string|max:100',
            'descripcion_tipo'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);

        $datostipo_materia_primas = request()->except(['_token','_method']);

        tipo_materia_primas::where('id','=',$id)->update($datostipo_materia_primas);
        $tipo_materia_primas=tipo_materia_primas::findOrFail($id);
        return redirect('tipo_materia_primas')->with('mensaje','Tipo de materia modificado correctamente');
    }
    public function destroy($id)
    {
        //se esta recepcionando el id del formulario del index
        $tipo_materia_primas=tipo_materia_primas::findOrFail($id);
        tipo_materia_primas::destroy($id);
        return redirect('tipo_materia_primas')->with('mensaje','Tipo de materia eliminado');
    }
}
