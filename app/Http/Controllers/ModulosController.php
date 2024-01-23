<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModulosController extends Controller
{
    public function showModuloEjecucion(){ 
        return view('modulos.ejecucion-actividad');
    }
}
