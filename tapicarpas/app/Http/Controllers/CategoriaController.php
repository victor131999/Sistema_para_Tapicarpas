<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Colocamos el middleware
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $datos['categorias']=categoria::orderBy('id','DESC')->paginate(10);

        return view('categoria.index',$datos);
    }
    public function create()
    {
        //
        return view('categoria.create');
    }
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);
        $datosCategoria = request()->except('_token');


        categoria::insert($datosCategoria);
        return redirect('categoria')->with('mensaje','Categoría agregada con exito');
    }
    public function edit($id)
    {
        $categoria =categoria::findOrFail($id);
        return view('categoria.edit',compact('categoria'));
    }
    public function update(Request $request, $id)
    {
        //Validación de datos
        $campos=[
            'nombre'=>'required|string|max:100',
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];

        $mensaje=[
            'numeric'=>'El :attribute tiene que ser un número',
        ];

        $this->validate($request, $campos, $mensaje);

        $datosCategoria = request()->except(['_token','_method']);

        categoria::where('id','=',$id)->update($datosCategoria);
        $categoria=categoria::findOrFail($id);
        return redirect('categoria')->with('mensaje','Categoria modificada correctamente');
    }
    public function destroy($id)
    {
        $categoria=categoria::findOrFail($id);
        categoria::destroy($id);
        return redirect('categoria')->with('mensaje','Categoria eliminada');
    }
}
