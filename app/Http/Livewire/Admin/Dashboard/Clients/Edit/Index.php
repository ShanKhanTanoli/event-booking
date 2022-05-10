<?php

namespace App\Http\Livewire\Admin\Dashboard\Clients\Edit;

use Exception;
use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $user;

    public $name, $user_name, $email, $number, $parent_business_id;

    public function mount($slug)
    {
        App::setLocale(Admin::Language());
        $this->user = User::where('slug', $slug)
            ->first();
        if ($this->user) {
            $this->name = $this->user->name;
            $this->user_name = $this->user->user_name;
            $this->email = $this->user->email;
            $this->number = $this->user->number;
            $this->parent_business_id = $this->user->parent_business_id;
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminClients', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.clients.edit.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $msg = [
            'parent_business_id.required' => 'Select parent business',
            'parent_business_id.numeric' => 'Select parent business',
        ];
        $validated = $this->validate([
            'name' => 'required|string|min:3',
            'user_name' => 'required|string|unique:users,user_name,' . $this->user->id,
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'number' => 'required|numeric|unique:users,number,' . $this->user->id,
            'parent_business_id' => 'required|numeric',
        ], $msg);
        try {
            $this->user->update($validated);
            session()->flash('success', trans('alerts.update'));
            return redirect(route('AdminEditClient', ['slug' => $this->user->slug, 'lang' => App::getLocale()]));
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
