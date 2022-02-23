<?php

namespace App\Http\Livewire\Dashboard\Client\Subscriptions;

use Livewire\Component;

class Subscribe extends Component
{
    public $plan;

    public function render()
    {
        return view('livewire.dashboard.client.subscriptions.subscribe')
            ->with([
                'plan' => $this->plan,
            ]);;
    }
}
