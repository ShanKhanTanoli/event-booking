<?php

namespace App\Http\Livewire\Business\Dashboard\BusinessDetails;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public function mount($lang = "en")
    {
        App::setlocale($lang);
    }

    public function render()
    {
        return view('livewire.business.dashboard.business-details.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
