<?php

namespace App\Livewire\Admin;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\EjecucionActividad;
use App\Models\Ciudad;

class Index extends Component
{
    use WithPagination;
    // Models 
    public $ciudad;

    // Useful vars
    public $ciudades = [], $superAdmin = false;

    public function render()
    {
        $filtro = [];
        if ($this->ciudad) {
            $filtro = ['ciudad_id' => $this->ciudad];
        }

        $ejecuciones = EjecucionActividad::select('id', 'user_id', 'fechaVisita', 'punto_id')
                    ->with('promotor')->whereHas('promotor', function ($ejecucion) use ($filtro) {
                        $ejecucion->where($filtro);
                    })->orderBy('id', 'desc')->paginate(15);
        return view('livewire.admin.index', ['ejecuciones' => $ejecuciones]);
    }

    public function mount(){
        $this->ciudades = Ciudad::select('id', 'description')->get();

        $this->superAdmin = (Auth()->user()->id == 1 || Auth()->user()->id == 3 || Auth()->user()->id == 41) ? true : false;
        (!$this->superAdmin)? $this->ciudad = Auth()->user()->ciudad_id : $this->ciudad = [];
    }
} 
 