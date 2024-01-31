<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Ciudad;
use App\Models\Rol;
use App\Models\Estado; 
use Illuminate\Validation\Rules;

class Register extends Component
{
    // Models 
    public $name = "", $email, $password, $password_confirmation, $ciudad, $rol = 2, $estado = 1;

    // Useful vars
    public $ciudades = [], $roles = [], $estados = [];

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function mount(){
        $this->getCiudades(); 
        $this->getRoles();
        $this->getEstados();
    }

    public function getCiudades(){
        $this->ciudades = Ciudad::select('id', 'description')->get();
    }

    public function getRoles(){
        $this->roles = Rol::select('id', 'description')->get();
    }

    public function getEstados(){
        $this->estados = Estado::select('id', 'description')->get();
    }

    public function updatedName(){
        $this->validate([
            'name' => 'required|string'
        ]);
    }

    public function updatedEmail(){
        $this->validate([ 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]); 
    }

    public function updatedCiudad(){
        $this->validate([
            'ciudad' => 'required|numeric'
        ]);
    }

    public function updatedRol(){
        $this->validate([  
            'rol' => 'required|numeric'
        ]);
    }

    public function updatedEstado(){
        $this->validate([
            'estado' => 'required|numeric'
        ]);
    }

    public function updatedPassword(){
        $this->validate([
            'password' => ['required', Rules\Password::defaults()]
        ]);
    }

    public function updatedPasswordConfirmation(){
        $this->validate([
            'password_confirmation' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
    }
}
