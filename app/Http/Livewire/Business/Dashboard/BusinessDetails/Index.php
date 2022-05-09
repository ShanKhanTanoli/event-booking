<?php

namespace App\Http\Livewire\Business\Dashboard\BusinessDetails;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.business.dashboard.business-details.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
