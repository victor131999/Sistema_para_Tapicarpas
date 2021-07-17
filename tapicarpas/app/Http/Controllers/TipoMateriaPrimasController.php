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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipo_materia_primas  $tipo_materia_primas
     * @return \Illuminate\Http\Response
     */
    public function show(tipo_materia_primas $tipo_materia_primas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipo_materia_primas  $tipo_materia_primas
     * @return \Illuminate\Http\Response
     */
    public function edit(tipo_materia_primas $tipo_materia_primas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipo_materia_primas  $tipo_materia_primas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipo_materia_primas $tipo_materia_primas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipo_materia_primas  $tipo_materia_primas
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipo_materia_primas $tipo_materia_primas)
    {
        //
    }
}
