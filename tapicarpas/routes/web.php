<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MateriaPrimaController;
use App\Http\Controllers\FacturaCompraController;
use App\Http\Controllers\TipoMateriaPrimasController;
use App\Http\Controllers\HerramientaController;
use App\Http\Controllers\ManoDeObraController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaProductoController;
use App\Http\Controllers\ProductoAFabricarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::resource('responsable', ResponsableController::class)->middleware('auth');

Route::resource('inicio', InicioController::class)->middleware('auth');

Route::resource('proveedor', ProveedorController::class)->middleware('auth');

Route::resource('materia_prima', MateriaPrimaController::class)->middleware('auth');


Route::resource('facturacompra', FacturaCompraController::class)->middleware('auth');

Route::resource('tipo_materia_primas', TipoMateriaPrimasController::class)->middleware('auth');

Route::resource('herramienta', HerramientaController::class)->middleware('auth');

Route::resource('mano_de_obra', ManoDeObraController::class)->middleware('auth');

Route::resource('categoria', CategoriaController::class)->middleware('auth');

Route::resource('subcategoria', SubcategoriaProductoController::class)->middleware('auth');

Route::resource('producto_a_fabricar', ProductoAFabricarController::class)->middleware('auth');

Route::group(['middleware' => 'auth'],function () {
    Route::get('/', [InicioController::class, 'index'])-> name('home');

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


