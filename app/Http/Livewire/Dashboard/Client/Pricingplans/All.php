<?php

namespace App\Http\Livewire\Dashboard\Client\Pricingplans;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Client\Client;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Rinvex\Subscriptions\Models\Plan;

class All extends Component
{
    public function render()
    {
        return view('livewire.dashboard.client.pricingplans.all');
    }

    public function PayNow($planId)
    {
        if (!is_null($plan = Plan::find($planId))) {
            if (Business::Is($plan->user_id)) {
                return redirect(route('ClientSubscribe', $plan->price_id));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function EndSubscription()
    {
        if ($subs = Client::HasActiveSubscription(Auth::user()->id)) {
            return Client::EndSubscription(Auth::user()->id, $subs->invoice);
        } else return session()->flash('error', 'Something went wrong');
    }
}
