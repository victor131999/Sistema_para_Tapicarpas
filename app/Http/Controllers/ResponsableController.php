<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
class ResponsableController extends Controller
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
        $datos['responsables']=Responsable::orderBy('id','DESC')->paginate(10);

        return view('responsable.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('responsable.create');
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
            'Direccion'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosResponsable = request()->except('_token');


        Responsable::insert($datosResponsable);
        return redirect('responsable')->with('mensaje','Responsable agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show(Responsable $responsable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $responsable=Responsable::findOrFail($id);
        return view('responsable.edit',compact('responsable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //Validación de datos
         $campos=[
            'Nombre'=>'required|string|max:100',
            'Direccion'=>'required|string|max:100',
            'Telefono'=>'required|string|max:100',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);

        $datosResponsable = request()->except(['_token','_method']);

        Responsable::where('id','=',$id)->update($datosResponsable);
        $responsable=Responsable::findOrFail($id);
        return redirect('responsable')->with('mensaje','Responsable modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //se esta recepcionando el id del formulario del index
        $responsable=Responsable::findOrFail($id);
        Responsable::destroy($id);
        return redirect('responsable')->with('mensaje','Responsable eliminado');
    }
}
