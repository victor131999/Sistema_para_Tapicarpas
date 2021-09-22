<?php

namespace App\Http\Controllers;

use App\Models\mano_de_obra;
use Illuminate\Http\Request;

class ManoDeObraController extends Controller
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
        $datos['mano_de_obras']=mano_de_obra::paginate(5);

        return view('mano_de_obra.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
      return view('mano_de_obra.create');
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
            'nombre'=>'required|string|max:100',
            'contacto'=>'required|string|max:100',
            'precio_hora'=>'numeric|min:0|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];


        $this->validate($request, $campos, $mensaje);
        $datosMano_de_obra = request()->except('_token');


        mano_de_obra::insert($datosMano_de_obra);
        return redirect('mano_de_obra')->with('mensaje','Persona para la mano de obra agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mano_de_obra  $mano_de_obra
     * @return \Illuminate\Http\Response
     */
    public function show(mano_de_obra $mano_de_obra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mano_de_obra  $mano_de_obra
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mano_de_obra =mano_de_obra::findOrFail($id);
        return view('mano_de_obra.edit',compact('mano_de_obra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mano_de_obra  $mano_de_obra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Validación de datos
        $campos=[
            'nombre'=>'required|string|max:100',
            'contacto'=>'required|string|max:100',
            'precio_hora'=>'numeric|min:0|nullable',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];


        $this->validate($request, $campos, $mensaje);

        $datosMano_de_obra = request()->except(['_token','_method']);

        mano_de_obra::where('id','=',$id)->update($datosMano_de_obra);
        $mano_de_obra=mano_de_obra::findOrFail($id);
        return redirect('mano_de_obra')->with('mensaje','Persona de mano de obra modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mano_de_obra  $mano_de_obra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //se esta recepcionando el id del formulario del index
        $mano_de_obra=mano_de_obra::findOrFail($id);
        mano_de_obra::destroy($id);
        return redirect('mano_de_obra')->with('mensaje','Persona de mano de obra eliminado');
    }
}
