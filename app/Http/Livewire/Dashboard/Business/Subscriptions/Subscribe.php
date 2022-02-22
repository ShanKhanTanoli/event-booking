<?php

namespace App\Http\Livewire\Dashboard\Business\Subscriptions;

use Livewire\Component;

class Subscribe extends Component
{
    public $plan;
    
    public function render()
    {
        return view('livewire.dashboard.business.subscriptions.subscribe',compact($this->plan));
    }
}
