<?php

namespace App\Http\Livewire\Dashboard\Client\Profile;

use Livewire\Component;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Updateprofile extends Component
{
    public $state = [];

    public function mount()
    {
        $this->state = auth()->user()
            ->only([
                'avatar',
                'name',
                'bio',
                'address',
                'phone',
                'email',
                'email_verified_at',
                'role',
                'created_at'
            ]);
    }

    public function render()
    {
        return view('livewire.dashboard.client.profile.updateprofile');
    }

    public function Update()
    {
        if ($user = Client::Is(Auth::user()->id)) {
            $validated = Validator::make($this->state, [
                'name' => 'required|string',
                'bio' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|numeric|unique:users,phone,' . auth()->user()->id,
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            ])->validate();
            $user->update($validated);
            session()->flash('success', 'Successfully Updated');
            return redirect(route('ClientProfile'));
        } else session()->flash('error', 'Something went wrong');
    }
}
