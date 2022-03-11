<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class Registerbusiness extends Component
{
    use RegistersUsers;

    public $state = [];

    public function render()
    {
        return view('livewire.auth.registerbusiness');
    }

    public function SaveBusiness()
    {
        $validated = Validator::make($this->state, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:6'],
        ])->validate();

        $this->SaveAsBusiness($validated);
    }
}
