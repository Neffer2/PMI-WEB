<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Venta;
use App\Models\producto;
use Illuminate\Support\Facades\Auth;
use App\Models\EjecucionActividad;
 
class Edit extends Component
{
    // Models
    public $interes_inicial, $interes_final, $presentacion, $edad, $cantidad, $genero;

    // Useful vars   
    public $ejecucion, $allowEdit, $productos = [];

    // filled
    public $ejecucion_id;
 
    public function render()
    {
        return view('livewire.admin.edit');
    }

    public function mount(){
        $this->allowEdit = ((Auth::user()->id == 1) || (Auth::user()->id == 3)) ? true : false;
        $this->ejecucion = EjecucionActividad::find($this->ejecucion_id);
        $this->productos = Producto::all(); 
    } 

    public function deleteRegistro(){
        $this->ejecucion->abordaje->ventas->map(function ($venta){
            $venta->delete();
        });
        $this->ejecucion->abordaje->gifus->map(function ($gifu){
            $gifu->delete();
        });
        $this->ejecucion->abordaje->delete();
        $this->ejecucion->delete();

        return redirect()->route('lista')->with('success', 'Registro eliminado con éxito.'); 
    }

    public function eliminarVenta($id){
        $venta = Venta::find($id);
        $venta->delete();
        $this->mount();
    }

    public function storeVenta(){
        $this->validate([
            'interes_inicial' => 'required|numeric', 
            'interes_final' => 'required|numeric',
            'presentacion' => 'required|string',
            'genero' => 'required|string',
            'edad' => 'required|string',
            'cantidad' => 'required|numeric|min:0'
        ]);

        $venta = new Venta();
        $venta->ventas_abordaje_id = $this->ejecucion->abordaje->id;
        $venta->interes_inicial = $this->interes_inicial;
        $venta->interes_final = $this->interes_final;
        $venta->presentacion = $this->presentacion;
        $venta->genero = $this->genero;
        $venta->edad = $this->edad;
        $venta->cantidad = $this->cantidad;
        $venta->save();

        $this->mount();
    }

    public function resetFileds(){
        $this->reset(
            'interes_inicial', 
            'interes_final',
            'presentacion',
            'genero',
            'edad',
            'cantidad'
        );
    }
}
  