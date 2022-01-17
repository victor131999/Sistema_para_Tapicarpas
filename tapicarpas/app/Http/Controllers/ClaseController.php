<?php

namespace App\Http\Controllers;

use App\Models\clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
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
        $datos['clases']=clase::orderBy('id','DESC')->paginate(10);

        return view('clase.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clase.create');
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
        //
        $campos=[
            'nombre'=>'required|string|max:100',
            'cod'=>'numeric|min:0|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosClase = request()->except('_token');


        clase::insert($datosClase);
        return redirect('clase')->with('mensaje','Clase agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $clase =clase::findOrFail($id);
        return view('clase.edit',compact('clase'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Validación de datos
        $campos=[
            'nombre'=>'required|string|max:100',
            'cod'=>'numeric|min:0|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosClase = request()->except(['_token','_method']);

        clase::where('id','=',$id)->update($datosClase);
        $clase=clase::findOrFail($id);
        return redirect('clase')->with('mensaje','Clase modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $clase=clase::findOrFail($id);
        clase::destroy($id);
        return redirect('clase')->with('mensaje','Clase eliminada');
    }
}
