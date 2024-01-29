<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\EjecucionActividad;

class Index extends Component
{
    public function render()
    {
        $ejecuciones = EjecucionActividad::select('id', 'user_id', 'fechaVisita', 'punto_id')->orderBy('id', 'desc')->paginate(15);
        return view('livewire.admin.index', ['ejecuciones' => $ejecuciones]);
    }
}
 