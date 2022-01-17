<?php

namespace App\Http\Controllers;

use App\Models\familia;
use Illuminate\Http\Request;

class FamiliaController extends Controller
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
        $datos['familias']=familia::orderBy('id','DESC')->paginate(10);

        return view('familia.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('familia.create');
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
        $datosfamilia = request()->except('_token');


        familia::insert($datosfamilia);
        return redirect('familia')->with('mensaje','Familia agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function show(familia $familia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $familia =familia::findOrFail($id);
        return view('familia.edit',compact('familia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\familia  $familia
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

        $datosfamilia = request()->except(['_token','_method']);

        familia::where('id','=',$id)->update($datosfamilia);
        $familia=familia::findOrFail($id);
        return redirect('familia')->with('mensaje','Familia modificada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\familia  $familia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $familia=familia::findOrFail($id);
        familia::destroy($id);
        return redirect('familia')->with('mensaje','Familia eliminada');
    }
}
