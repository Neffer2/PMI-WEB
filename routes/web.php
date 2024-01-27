<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\ModulosController;
use App\Http\Controllers\AdminController;
 
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
Route::get('/cierre/{id_ejecucion}', [ModulosController::class, 'cierre'])->middleware('auth')->name('cierre'); 

Route::get('/lista', [AdminController::class, 'index'])->middleware('auth')->middleware('admin')->name('lista'); 
Route::get('/visita/{id_ejecucion}', [AdminController::class, 'edit'])->middleware('auth')->middleware('admin')->name('visita'); 
Route::get('/export', [AdminController::class, 'exportExcel'])->middleware('auth')->middleware('admin')->name('export'); 

require __DIR__.'/auth.php';
 