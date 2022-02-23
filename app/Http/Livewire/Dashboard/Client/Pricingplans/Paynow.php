<?php

namespace App\Http\Livewire\Dashboard\Client\Pricingplans;

use Livewire\Component;

class Paynow extends Component
{
    public $plan;

    public function render()
    {
        return view('livewire.dashboard.client.pricingplans.paynow')
            ->with([
                'plan' => $this->plan,
            ]);
    }
}
