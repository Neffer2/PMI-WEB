<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Validation\Rules;

class Login extends Component
{
    // Models
    public $email, $password;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function updatedEmail(){
        $this->validate([
            'email' => 'required|email'
        ]);
    }

    public function updatedPassword(){
        $this->validate([
            'password' => ['required']
        ]);
    }
}
