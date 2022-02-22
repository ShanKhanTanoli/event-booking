<?php

namespace App\Http\Livewire\Dashboard\Client\Pricingplans;

use Livewire\Component;
use App\Helpers\Business\Business;
use Rinvex\Subscriptions\Models\Plan;

class Paynow extends Component
{
    public $plan;

    public function render()
    {
        return view('livewire.dashboard.client.pricingplans.paynow',compact($this->plan));
    }
}
