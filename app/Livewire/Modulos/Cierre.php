<?php

namespace App\Livewire\Modulos;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\EjecucionActividad;

class Cierre extends Component
{
    use WithFileUploads; 

    // Models
    public $foto_cierre;
    // Filled
    public $ejecucion_id;  

    public function render()
    {
        return view('livewire.modulos.cierre');
    }

    public function cerrar(){
        $this->validate([
            'foto_cierre' => 'required|mimes:jpeg,png,jpg,gif'
        ]);

        $ejecucion = EjecucionActividad::find($this->ejecucion_id);
        $ejecucion->cerrado = 1;
        $ejecucion->foto_cierre = $this->foto_cierre->store(path: 'foto_cierre');        

        if ($ejecucion->update()){
            return redirect()->route('home')->with('success', 'Punto cerrado exitosamente');
        }
    }
}
