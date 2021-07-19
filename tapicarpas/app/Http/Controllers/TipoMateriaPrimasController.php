<?php

namespace App\Http\Controllers;

use App\Models\tipo_materia_primas;
use Illuminate\Http\Request;

class TipoMateriaPrimasController extends Controller
{
    protected $fillable = ['id'];
    //realacion de uno a muchos(inversa)
    public function materia_prima(){
        return $this->hasMany('App\Models\materia_prima');
    }
    public function index()
    {
        $tipo_materia_prima = tipo_materia_primas::all();
        return view('tipo.index', compact('tipo_materia_prima'));
    }
    public function create()
    {
        return view('tipo.create');
    }
    public function store(Request $request)
    {
        return view('tipo.index');
    }
    public function show(tipo_materia_primas $tipo_materia_primas)
    {
        return view('tipo.show');
    }
    public function edit(tipo_materia_primas $tipo_materia_primas)
    {
        return view('tipo.edit');
    }
    public function update(Request $request, tipo_materia_primas $tipo_materia_primas)
    {
        return view('tipo.edit');
    }
    public function destroy(tipo_materia_primas $tipo_materia_primas)
    {
        return view('tipo.index');
    }
}
