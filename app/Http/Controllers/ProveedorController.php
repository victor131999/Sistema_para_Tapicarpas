<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
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
        $datos['proveedors']=Proveedor::orderBy('id','DESC')->paginate(10);

        return view('proveedor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('proveedor.create');
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
        $datosProveedor = request()->except('_token');


        Proveedor::insert($datosProveedor);
        return redirect('proveedor')->with('mensaje','Proveedor agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proveedor =Proveedor::findOrFail($id);
        return view('proveedor.edit',compact('proveedor'));
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

        $datosProveedor = request()->except(['_token','_method']);

        Proveedor::where('id','=',$id)->update($datosProveedor);
        $proveedor=Proveedor::findOrFail($id);
        return redirect('proveedor')->with('mensaje','Proveedor modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //se esta recepcionando el id del formulario del index
        $proveedor=Proveedor::findOrFail($id);
        Proveedor::destroy($id);
        return redirect('proveedor')->with('mensaje','Proveedor eliminado');
    }
}
