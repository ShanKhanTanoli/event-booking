<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Illuminate\Support\Facades\App;
use Livewire\Component;

class Index extends Component
{

    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }
    public function render()
    {
        return view('livewire.admin.dashboard.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
