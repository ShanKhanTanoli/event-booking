<?php

namespace App\Http\Livewire\Client\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }
    
    public function render()
    {
        return view('livewire.client.dashboard.index')
        ->extends('layouts.dashboard')
        ->section('content');
    }
}
