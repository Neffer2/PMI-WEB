<?php

namespace App\Http\Controllers;
use App\Models\EjecucionActividad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModulosController extends Controller
{
    public function showDashboard(){
        $lastEjecucion = EjecucionActividad::select('id', 'cerrado')->where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        
        return view('dashboard', ['lastEjecucion' => $lastEjecucion]);
    }   

    public function showModuloEjecucion(){
        return view('modulos.ejecucion-actividad');
    }

    public function showModuloVentasAbordaje($ejecucion_id){
        return view('modulos.vetentas-abordaje', ['ejecucion_id' => $ejecucion_id]);
    }

    public function cierre(Request $request, $ejecucion_id){
        return view('modulos.cierre', ['ejecucion_id' => $ejecucion_id, 'user_ip' => $request->ip()]);
    }   
}
 