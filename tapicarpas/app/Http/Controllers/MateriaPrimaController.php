<?php

namespace App\Http\Controllers;

use App\Models\materia_prima;
use App\Models\tipo_materia_primas;
use Illuminate\Http\Request;

class MateriaPrimaController extends Controller
{
    protected $fillable = ['id_tipo'];
    //realacion de uno a muchos
    public function tipos(){
        return $this->belongsTo('App\Models\tipo_materia_primas','id_tipo');
    }
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
        $datos['materia_primas']=materia_prima::paginate(5);
        return view('materia_prima.index',$datos,);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datostipo['tipo_materia_primas']=tipo_materia_primas::all();
        return view('materia_prima.create',$datostipo);
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
            'nombre_mp'=>'required|string|max:100',
            'color_mp'=>'required|string|max:100',
            'ancho_mp'=>'numeric|min:0|nullable',
            'largo_mp'=>'numeric|min:0|nullable',
            'id_tipo'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosMateria_prima = request()->except('_token');


        materia_prima::insert($datosMateria_prima);
        return redirect('materia_prima')->with('mensaje','La materia prima fue agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\materia_prima  $materia_prima
     * @return \Illuminate\Http\Response
     */
    public function show(materia_prima $materia_prima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\materia_prima  $materia_prima
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $materia_prima =materia_prima::findOrFail($id);
        $tipo_materia_primas =tipo_materia_primas::findOrFail($id);
        return view('materia_prima.edit',compact('materia_prima','tipo_materia_primas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\materia_prima  $materia_prima
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación de datos
        $campos=[
            'nombre_mp'=>'required|string|max:100',
            'color_mp'=>'required|string|max:100',
            'ancho_mp'=>'numeric|min:0|nullable',
            'largo_mp'=>'numeric|min:0|nullable',
            'id_tipo'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El campo :attribute es requerido',

        ];
        $mensaje=[
            'numeric'=>'El campo :attribute tiene que ser un número',
        ];


        $this->validate($request, $campos, $mensaje);

        $datosMateria_prima = request()->except(['_token','_method']);

        materia_prima::where('id','=',$id)->update($datosMateria_prima);
        $materia_prima=materia_prima::findOrFail($id);
        return redirect('materia_prima')->with('mensaje','Materia prima modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\materia_prima  $materia_prima
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                //se esta recepcionando el id del formulario del index
                $materia_prima=materia_prima::findOrFail($id);
                materia_prima::destroy($id);
                return redirect('materia_prima')->with('mensaje','Materia prima eliminada');
    }
}
