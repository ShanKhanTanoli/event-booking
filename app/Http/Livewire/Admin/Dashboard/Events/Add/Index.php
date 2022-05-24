<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\Add;

use Exception;
use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Str;
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
            'user_id' => 'required|numeric',
        ]);
        $data = [
            'name' => $validated['name'],
            'user_id' => $validated['user_id'],
            'created_by' => 'Admin',
            'slug' => strtoupper(Str::random(10)),
        ];
        try {
            Event::create($data);
            session()->flash('success', trans('alerts.add'));
            return redirect(route('AdminEvents', ['lang' => App::getLocale()]));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
