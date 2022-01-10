<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class InicioController extends Controller
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
        $detalles = [];
        //$NumClientes = DB::table('clientes')->get();
        $NumClientes = DB::table('clientes')->orderBy('id', 'desc')->first();
        $NumOrdenesProduccion = DB::table('producto_a_fabricars')->orderBy('id', 'desc')->first();
        $NumProductosFinalizados = DB::table('producto_finalizados')->orderBy('id', 'desc')->first();
        //dd($NumClientes);
        //dd($NumOrdenesProduccion);
        //dd($NumProductosFinalizados);
        /*return view('inicio.index',
        ['NumClientes' => $NumClientes],
        ['NumOrdenesProduccion' => $NumOrdenesProduccion],
        ['NumProductosFinalizados' => $NumProductosFinalizados]);*/
        return View::make('inicio.index',compact("detalles","NumClientes","NumOrdenesProduccion","NumProductosFinalizados") );


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
     * @param  \App\Models\Inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function show(Inicio $inicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function edit(Inicio $inicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inicio $inicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inicio $inicio)
    {
        //
    }
}
