<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\Add;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $name, $subscription_id, $user_id;

    public function render()
    {
        return view('livewire.admin.dashboard.events.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'subscription_id' => 'required|numeric',
            'user_id' => 'required|numeric',
        ]);

        dd($validated);

        try {
            session()->flash('success', trans('alerts.add'));
            return redirect(route('AdminEvents', App::getLocale()));
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
