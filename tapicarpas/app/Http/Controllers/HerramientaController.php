<?php

namespace App\Http\Controllers;

use App\Models\area;
use App\Models\clase;
use App\Models\familia;
use App\Models\herramienta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HerramientaController extends Controller
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
        $datos['herramientas']=Herramienta::paginate(5);

        return view('herramienta.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datosArea['area']=area::all();
        $datosClase['clase']=clase::all();
        $datosFamilia['familia']=familia::all();
        return View::make('herramienta.create')->
        with($datosArea)->
        with($datosClase)->
        with($datosFamilia);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //Validación de datos
        $campos=[
            'Nombre'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'modelo'=>'required|string|max:100',
            'costo'=>'numeric|min:0|nullable',
            'codA'=>'numeric|min:0|nullable',
            'codC'=>'numeric|min:0|nullable',
            'codF'=>'numeric|min:0|nullable',
            'codI'=>'numeric|min:0|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosHerramienta = request()->except('_token');


        Herramienta::insert($datosHerramienta);
        return redirect('herramienta')->with('mensaje','Herramienta agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function show(herramienta $herramienta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $herramienta =Herramienta::findOrFail($id);
        return view('herramienta.edit',compact('herramienta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //Validación de datos
         $campos=[
            'Nombre'=>'required|string|max:100',
            'marca'=>'required|string|max:100',
            'modelo'=>'required|string|max:100',
            'costo'=>'numeric|min:0|nullable',
            'codA'=>'numeric|min:0|nullable',
            'codC'=>'numeric|min:0|nullable',
            'codF'=>'numeric|min:0|nullable',
            'codI'=>'numeric|min:0|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosHerramienta = request()->except(['_token','_method']);

        Herramienta::where('id','=',$id)->update($datosHerramienta);
        $herramienta=Herramienta::findOrFail($id);
        return redirect('herramienta')->with('mensaje','Herramienta modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\herramienta  $herramienta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //se esta recepcionando el id del formulario del index
        $herramienta=Herramienta::findOrFail($id);
        Herramienta::destroy($id);
        return redirect('herramienta')->with('mensaje','Herramienta eliminado');
    }
}
