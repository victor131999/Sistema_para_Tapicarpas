<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\InicioController;
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

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::group(['middleware' => 'auth'],function () {
    Route::get('/', [InicioController::class, 'index'])-> name('home');
    //Route::get('/', [ResponsableController::class, 'index'])-> name('responsable');
});
