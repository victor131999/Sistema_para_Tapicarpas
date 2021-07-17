<?php

namespace App\Http\Controllers;

use App\Models\material_reventa;
use Illuminate\Http\Request;

class MaterialReventaController extends Controller
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
        $datos['material_reventas']=material_reventa::paginate(5);

        return view('material_reventa.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('material_reventa.create');
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
            'nombre_mrev'=>'required|string|max:100',
            'descripcion_mrev'=>'required|string|max:100',
            'precio_mrev'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosmaterial_reventa = request()->except('_token');


        material_reventa::insert($datosmaterial_reventa);
        return redirect('material_reventa')->with('mensaje','Material agregado con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\material_reventa  $material_reventa
     * @return \Illuminate\Http\Response
     */
    public function show(material_reventa $material_reventa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\material_reventa  $material_reventa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $material_reventa =material_reventa::findOrFail($id);
        return view('material_reventa.edit',compact('material_reventa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\material_reventa  $material_reventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Validación de datos
        $campos=[
            'nombre_mrev'=>'required|string|max:100',
            'descripcion_mrev'=>'required|string|max:100',
            'precio_mrev'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];


        $this->validate($request, $campos, $mensaje);

        $datosmaterial_reventa = request()->except(['_token','_method']);

        material_reventa::where('id','=',$id)->update($datosmaterial_reventa);
        $material_reventa=material_reventa::findOrFail($id);
        return redirect('material_reventa')->with('mensaje','Material modificado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\material_reventa  $material_reventa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //se esta recepcionando el id del formulario del index
        $material_reventa=material_reventa::findOrFail($id);
        material_reventa::destroy($id);
        return redirect('material_reventa')->with('mensaje','material_reventa eliminado');
    }
}
