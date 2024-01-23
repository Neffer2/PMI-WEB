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

Route::get('/', function (){
    return view('dashboard');
})->middleware('auth')->name('home');

Route::get('/ejecucion-actividad', [ModulosController::class, 'showModuloEjecucion'])->middleware('auth')->name('ejecucion');

require __DIR__.'/auth.php';
