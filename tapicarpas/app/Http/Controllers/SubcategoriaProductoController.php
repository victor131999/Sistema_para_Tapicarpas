<?php

namespace App\Http\Controllers;
use App\Models\categoria;
use App\Models\subcategoria_producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SubcategoriaProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $datos['subcategorias']=subcategoria_producto::paginate(5);
        return view('subcategoria.index',$datos);
    }
    public function create()
    {
        $datosCategoria['categoria']=categoria::all();
        return View::make('subcategoria.create' )->
        with($datosCategoria);
    }
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'id_categoria'=>'numeric|min:0|nullable'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];
        $this->validate($request, $campos, $mensaje);
        $datosSubcategoria = request()->except('_token');
        subcategoria_producto::insert($datosSubcategoria);
        return redirect('subcategoria')->with('mensaje','Subcategoría agregada con exito');
    
    }
    public function edit($id)
    {
        $subcategoria =subcategoria_producto::findOrFail($id);
        $datosCategoria['categoria']=categoria::all();
        return view('subcategoria.edit',compact('subcategoria'))->
        with($datosCategoria);
    }
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'id_categoria'=>'numeric|min:0|nullable'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];
        $this->validate($request, $campos, $mensaje);
        $datosSubcategoria = request()->except('_token','_method');
        subcategoria_producto::where('id','=',$id)->update($datosSubcategoria);
        $subcategoria=subcategoria_producto::findOrFail($id);
        return redirect('subcategoria')->with('mensaje','Subcategoria modificada correctamente');
 
    }
    public function destroy($id)
    {
        $subcategoria=subcategoria_producto::findOrFail($id);
        subcategoria_producto::destroy($id);
        return redirect('subcategoria')->with('mensaje','Subcategoria eliminada');
   
    }
}
