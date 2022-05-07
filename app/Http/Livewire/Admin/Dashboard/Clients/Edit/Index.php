<?php

namespace App\Http\Livewire\Admin\Dashboard\Clients\Edit;

use Exception;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $user;

    public $name,$user_name,$email,$number,$parent_business_id;

    public function mount($slug)
    {
        $this->user = User::where('slug', $slug)
            ->first();
        if ($this->user) {
            $this->name = $this->user->name;
            $this->user_name = $this->user->user_name;
            $this->email = $this->user->email;
            $this->number = $this->user->number;
            $this->parent_business_id = $this->user->parent_business_id;
        } else {
            session()->flash('error', 'Client does not exist');
            return redirect(route('AdminClients'));
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
        ],$msg);
        try {
            $this->user->update($validated);
            session()->flash('success', 'Updated Successfully');
            return redirect(route('AdminEditClient', $this->user->slug));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
