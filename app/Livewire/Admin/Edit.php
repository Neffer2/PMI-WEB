<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\EjecucionActividad;
 
class Edit extends Component
{
    // Models
    
    // Useful vars  
    public $ejecucion;
    // filled
    public $ejecucion_id;
 
    public function render()
    {
        return view('livewire.admin.edit');
    }

    public function mount(){
        $this->ejecucion = EjecucionActividad::find($this->ejecucion_id);
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
}
