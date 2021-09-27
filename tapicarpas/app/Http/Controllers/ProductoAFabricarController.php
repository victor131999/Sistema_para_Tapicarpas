<?php

namespace App\Http\Controllers;

use App\Models\producto_a_fabricar;
use App\Models\Responsable;
use App\Models\categoria;
use Illuminate\Http\Request;

class ProductoAFabricarController extends Controller
{
    protected $fillable = ['id_categoria','id_responsable'];
    //realacion de uno a muchos
    public function categorias(){
        return $this->belongsTo('App\Models\categoria','id_categoria');
    }

    public function responsables(){
        return $this->belongsTo('App\Models\Responsable','id_responsable');
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
        $datos['producto_a_fabricars']=producto_a_fabricar::paginate(5);
        return view('producto_a_fabricar.index',$datos,);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datosCategoria['categoria']=categoria::all();
        $datosResponsable['responsable']=Responsable::all();
        return view('producto_a_fabricar.create',$datosCategoria, $datosResponsable);
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
            'nombre'=>'required|string|max:100',
            'fecha_inicio'=>'required|string|max:100',
            'fecha_fin'=>'required|string|max:100',
            'color'=>'required|string|max:100',
            'medida'=>'required|string|max:100',
            'material'=>'required|string|max:100',
            'id_categoria'=>'numeric|min:0|nullable',
            'id_responsable'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosProducto_a_Fafricar = request()->except('_token');


        producto_a_fabricar::insert($datosProducto_a_Fafricar);
        return redirect('producto_a_fabricar')->with('mensaje','El producto a fabricar fue agregada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto_a_fabricar  $producto_a_fabricar
     * @return \Illuminate\Http\Response
     */
    public function show(producto_a_fabricar $producto_a_fabricar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto_a_fabricar  $producto_a_fabricar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $datoscategoria['categoria']=categoria::all();
        $datosresponsable['Responsable']=Responsable::all();
        $producto_a_fabricar =producto_a_fabricar::findOrFail($id);
        $categoria =categoria::findOrFail( $producto_a_fabricar->categorias->id);
        $responsable =Responsable::findOrFail( $producto_a_fabricar->responsables->id);

        return view('producto_a_fabricar.edit',$datoscategoria,$datosresponsable,compact('producto_a_fabricar','categoria','responsable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto_a_fabricar  $producto_a_fabricar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación de datos
        $campos=[
            'nombre'=>'required|string|max:100',
            'fecha_inicio'=>'required|string|max:100',
            'fecha_fin'=>'required|string|max:100',
            'color'=>'required|string|max:100',
            'medida'=>'required|string|max:100',
            'material'=>'required|string|max:100',
            'id_categoria'=>'numeric|min:0|nullable',
            'id_responsable'=>'numeric|min:0|nullable',

        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProducto_a_Fabricar = request()->except(['_token','_method']);

        producto_a_fabricar::where('id','=',$id)->update($datosProducto_a_Fabricar);
        $producto_a_fabricar=producto_a_fabricar::findOrFail($id);
        return redirect('producto_a_fabricar')->with('mensaje','Producto a fabricar modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto_a_fabricar  $producto_a_fabricar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //se esta recepcionando el id del formulario del index
        $producto_a_fabricar=producto_a_fabricar::findOrFail($id);
        producto_a_fabricar::destroy($id);
        return redirect('producto_a_fabricar')->with('mensaje','Producto a fabricar eliminado');
    }
}
