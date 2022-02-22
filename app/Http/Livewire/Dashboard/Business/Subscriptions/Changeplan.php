<?php

namespace App\Http\Livewire\Dashboard\Business\Subscriptions;

use Livewire\Component;

class Changeplan extends Component
{
    public $plan;

    public function render()
    {
        return view('livewire.dashboard.business.subscriptions.changeplan',compact($this->plan));
    }
}
