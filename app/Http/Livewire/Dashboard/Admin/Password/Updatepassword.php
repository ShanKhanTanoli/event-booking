<?php

namespace App\Http\Livewire\Dashboard\Admin\Password;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Rules\CurrentPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Updatepassword extends Component
{
    public $state = [];
    
    public function render()
    {
        return view('livewire.dashboard.admin.password.updatepassword');
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'current_password' => ['required', 'string', new CurrentPassword()],
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ])->validate();

        if ($user = Admin::Is(Auth::user()->id)) {

            $this->reset(['state']);

            $user->update(['password' => Hash::make($validated['password'])]);
            session()->flash('success', 'Password Updated Successfully');
        } else {
            session()->flash('error', 'Something went wrong!');
        }
    }
}
