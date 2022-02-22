<?php

namespace App\Http\Livewire\Dashboard\Admin\Profile;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Updateprofile extends Component
{
    public $state = [];

    public function mount()
    {
        $this->state = auth()->user()
            ->only(['name', 'email']);
    }
    public function render()
    {
        return view('livewire.dashboard.admin.profile.updateprofile');
    }

    public function UpdateProfile()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ])->validate();

        if ($user = Admin::Is(Auth::user()->id)) {
            $user->update($validated);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong');
    }
}
