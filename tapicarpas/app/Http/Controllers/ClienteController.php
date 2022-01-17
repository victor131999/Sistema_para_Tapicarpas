<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clientes=cliente::orderBy('id','DESC')->paginate(10);
        return view('cliente.index',compact('clientes'));
    }
    public function create()
    {
        return view('cliente.create');
    }
    public function store(Request $request)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'cedula'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:100',
            'correo'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $cliente = request()->except('_token');
        cliente::insert($cliente);
        return redirect('cliente')->with('mensaje','Guardado con exito');
    }
    public function edit(cliente $cliente)
    {
        return view('cliente.edit',compact('cliente'));
    }
    public function update(Request $request, cliente $cliente)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'cedula'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'telefono'=>'required|string|max:100',
            'correo'=>'required|string|max:100'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
        ];
        $this->validate($request, $campos, $mensaje);
        $clienteDatos = request()->except(['_token','_method']);
        $cliente->update($clienteDatos);
        return redirect('cliente')->with('mensaje','Modificado correctamente');
    }
    public function destroy(cliente $cliente)
    {
        $cliente->delete();
        return back();
    }
}
