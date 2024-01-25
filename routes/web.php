<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\ModulosController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [ModulosController::class, 'showDashboard'])->middleware('auth')->name('home');
Route::get('/ejecucion-actividad', [ModulosController::class, 'showModuloEjecucion'])->middleware('auth')->name('ejecucion');
Route::get('/ventas-abordaje/{id_ejecucion}', [ModulosController::class, 'showModuloVentasAbordaje'])->middleware('auth')->name('ventas');

require __DIR__.'/auth.php';
