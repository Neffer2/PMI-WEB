<?php

namespace App\Livewire\Modulos;

use Livewire\Component;
use App\Models\Punto; 
use App\Models\EjecucionActividad;
use Livewire\WithFileUploads;
use App\Models\VentaAbordaje;
use Illuminate\Support\Facades\Auth;

class Ejecucion extends Component
{
    use WithFileUploads; 
 
    // MODELS
    public $punto, $fecha, $estrato, $barrio, $marca_foco, $selfie_pdv, $foto_fachada,
            $cod, $punto_nom;

    // Useful vars
    public $puntos = [];

    public function render()
    {
        $this->getPuntos();
        return view('livewire.modulos.ejecucion');
    }

    public function getPuntos(){
        $this->puntos = Punto::select('id', 'descripcion')->where('ciudad_id', Auth::user()->ciudad_id)->get();
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
        

        $ejecucion = new EjecucionActividad;
        $ejecucion->user_id = Auth::id();
        $ejecucion->punto_id = $this->punto;
        $ejecucion->fechaVisita = $this->fecha;
        $ejecucion->estrato = $this->estrato;
        $ejecucion->barrio = $this->barrio;
        $ejecucion->mensaje_foco = $this->marca_foco;
        $ejecucion->selfie_pdv = $this->selfie_pdv->store(path: 'public/selfie_pdv');
        $ejecucion->foto_fachada = $this->foto_fachada->store(path: 'public/foto_fachada');

        if ($ejecucion->save()){
            $VentaAbordaje = new VentaAbordaje;
            $VentaAbordaje->ejecucion_id = $ejecucion->id;
            $VentaAbordaje->save();
            
            return redirect()->route('home')->with('success', 'Ejecución de la actividad enviada');
        }
    }

    public function newPunto(){
        $this->validate([
            'cod' => ['required', 'numeric', 'unique:puntos_venta'],
            'punto_nom' => 'required|string'
        ]);

        $punto = new Punto;
        $punto->cod = $this->cod;
        $punto->descripcion = $this->punto_nom;
        $punto->ciudad_id = Auth::user()->ciudad_id;
        $punto->save();

        $this->getPuntos();
        $this->punto = $punto->id;
    }

    // UPDATES
    public function updatedPunto(){
        $this->validate([
            'punto' => 'required'
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

    public function updatedCod(){
        $this->validate([
            'cod' => ['required', 'numeric', 'unique:puntos_venta']
        ]);
    }
    
    public function updatedPuntoNom(){
        $this->validate([
            'punto_nom' => 'required|string'
        ]);
    }
}
