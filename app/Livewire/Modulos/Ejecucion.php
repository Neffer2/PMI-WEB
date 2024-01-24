<?php

namespace App\Livewire\Modulos;

use Livewire\Component;
use App\Models\Punto;
use Livewire\WithFileUploads; 

class Ejecucion extends Component
{
    use WithFileUploads; 
    // $this->remision->store('public/remisiones'); 

    // MODELS
    public $punto, $fecha, $estrato, $barrio, $marca_foco, $selfie_pdv, $foto_fachada;

    // Useful vars
    public $puntos = [];

    public function render()
    {
        return view('livewire.modulos.ejecucion');
    }

    public function mount(){

    }

    public function getPunto(){
        $this->puntos = Punto::select('id', 'descripcion')->get();
    }

    public function store(){

        $this->validate([
            'punto' => 'required|numeric',
            'fecha' => 'required|date',
            'estrato' => 'required|numeric',
            'barrio' => 'required|string|max:200',
            'marca_foco' => 'required|boolean',
            'selfie_pdv' => 'required|mimes:jpeg,png,jpg,gif',
            'foto_fachada' => 'required|mimes:jpeg,png,jpg,gif'
        ]);
        
        // dd($this->punto);
        // dd($this->fecha);
        // dd($this->estrato);
        // dd($this->barrio);
        // dd($this->marca_foco);
        // dd($this->selfie_pdv);
        // dd($this->foto_fachada);
    }

    // UPDATES
    public function updatedPunto(){
        $this->validate([
            'punto' => 'required|numeric'
        ]);
    }

    public function updatedFecha(){
        $this->validate([
            'fecha' => 'required|date'
        ]);
    }

    public function updatedEstrato(){
        $this->validate([
            'estrato' => 'required|numeric'
        ]);
    }

    public function updatedBarrio(){
        $this->validate([
            'barrio' => 'required|string|max:200'
        ]);
    }

    public function updatedMarcaFoco(){
        $this->validate([
            'marca_foco' => 'required|boolean'
        ]);
    }

    public function updatedSelfiePdv(){
        $this->validate([
            'selfie_pdv' => 'required|mimes:jpeg,png,jpg,gif'
        ]);
    }
    
    public function updatedFotoFachada(){
        $this->validate([
            'foto_fachada' => 'required|mimes:jpeg,png,jpg,gif'
        ]);
    }
}
