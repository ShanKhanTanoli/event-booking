<?php

namespace App\Http\Livewire\Business\Dashboard\Clients\Edit;

use App\Helpers\Business\Business;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $user;

    public $name, $user_name, $email, $number;

    public function mount($slug)
    {
        if ($client = Business::FindClientBySlug(Auth::user()->id, $slug)) {
            $this->user = $client;
            $this->name = $this->user->name;
            $this->user_name = $this->user->user_name;
            $this->email = $this->user->email;
            $this->number = $this->user->number;
        } else {
            session()->flash('error', 'Client does not exist');
            return redirect(route('BusinessClients', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.clients.edit.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'number' => 'required|numeric|unique:users,number,' . $this->user->id,
        ]);
        try {
            $this->user->update($validated);
            session()->flash('success', 'Updated Successfully');
            return redirect(route('BusinessEditClient', ['slug' => $this->user->slug, 'lang' => App::getLocale()]));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
