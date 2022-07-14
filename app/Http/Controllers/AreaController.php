<?php

namespace App\Http\Controllers;

use App\Models\area;
use Illuminate\Http\Request;

class AreaController extends Controller
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
        $datos['areas']=area::orderBy('id','DESC')->paginate(10);

        return view('area.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('area.create');
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
        $datosArea = request()->except('_token');


        area::insert($datosArea);
        return redirect('area')->with('mensaje','Area agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $area =area::findOrFail($id);
        return view('area.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\area  $area
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

        $datosArea = request()->except(['_token','_method']);

        area::where('id','=',$id)->update($datosArea);
        $area=area::findOrFail($id);
        return redirect('area')->with('mensaje','Area modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $area=area::findOrFail($id);
        area::destroy($id);
        return redirect('area')->with('mensaje','Area eliminada');
    }
}
