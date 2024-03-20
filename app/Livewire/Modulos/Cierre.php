<?php

namespace App\Livewire\Modulos;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\EjecucionActividad;
use GuzzleHttp\Client;

class Cierre extends Component
{
    use WithFileUploads; 

    // Models
    public $foto_cierre;
    // Filled
    public $ejecucion_id, $user_ip;   

    public function render()
    {
        return view('livewire.modulos.cierre');
    }

    public function mount(){
        $this->getUserInfo();
    }

    
    public function getUserInfo()
    {
        // Make a request to the ipinfo.io API
        $client = new Client();
        // $response = $client->get("https://ipinfo.io/186.29.247.166?token=25e53798e896ae");
        $response = $client->get("https://ipinfo.io/{$this->user_ip}?token=25e53798e896ae"); 
        // Parse the JSON response 
        $data = json_decode($response->getBody());
        return $data->loc;
    }

    public function cerrar(){
        $this->validate([
            'foto_cierre' => 'required|mimes:jpeg,png,jpg,gif'
        ]); 

        $ejecucion = EjecucionActividad::find($this->ejecucion_id);
        $ejecucion->ubicacion = $this->getUserInfo();
        $ejecucion->cerrado = 1;
        $ejecucion->foto_cierre = $this->foto_cierre->store(path: 'public/foto_cierre');        

        if ($ejecucion->update()){
            return redirect()->route('home')->with('success', 'Punto cerrado exitosamente');
        }
    }
}
