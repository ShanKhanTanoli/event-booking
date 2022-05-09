<?php

namespace App\Http\Livewire\Business\Dashboard\Clients\UpdatePassword;

use Exception;
use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $user;

    public $password, $password_confirmation;

    public function mount($slug)
    {
        if ($client = Business::FindClientBySlug(Auth::user()->id, $slug)) {
            $this->user = $client;
        } else {
            session()->flash('error', 'Account does not exist');
            return redirect(route('BusinessClients', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.clients.update-password.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|string|min:5|',
        ]);
        try {
            $this->user->update(['password' => bcrypt($validated['password'])]);
            session()->flash('success', 'Updated Successfully');
            $this->reset(['password', 'password_confirmation']);
            return redirect(route('BusinessUpdateClientPassword', ['slug' => $this->user->slug, 'lang' => App::getLocale()]));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
