<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use Illuminate\Http\Request;
use Illuminate\Http\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\facturaCompra;
use SebastianBergmann\Environment\Console as EnvironmentConsole;

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
        $facturacompras = facturaCompra::select (DB::raw("COUNT(*) as count"))
                            ->whereYear('created_at', date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('count');

        $months = facturaCompra::select (DB::raw("Month(created_at) as month"))
                            ->whereYear('created_at',date('Y'))
                            ->groupBy(DB::raw("Month(created_at)"))
                            ->pluck('month');

        $fechaEntera = time();
        //$anio = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        //$dia = date("d", $fechaEntera);

        //$egresofacturacompra = DB::table('factura_compras',now()->month)->sum('total_fac');
        $egresofacturacompra =DB::table('factura_compras')->whereMonth('created_at', $mes)->sum('total_fac');

        //dd($egresofacturacompra);

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month){
            $datas[$month] = $facturacompras[$index];
        }
        $detalles = [];
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
        return View::make('inicio.index',compact("detalles","NumClientes","NumOrdenesProduccion","NumProductosFinalizados","datas","egresofacturacompra") );


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
