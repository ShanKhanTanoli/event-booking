<?php

namespace App\Http\Livewire\Dashboard\Client\Subscriptions;

use Livewire\Component;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class All extends Component
{
    public function render()
    {
        $subscriptions = Client::Subscriptions(Auth::user())->latest()->paginate(6);
        return view('livewire.dashboard.client.subscriptions.all', compact('subscriptions'));
    }

    public function End()
    {
        if ($subs = Client::HasActiveSubscription(Auth::user()->id)) {
            return Client::EndSubscription(Auth::user()->id, $subs->invoice);
        } else return session()->flash('error', 'Something went wrong');
    }
}
