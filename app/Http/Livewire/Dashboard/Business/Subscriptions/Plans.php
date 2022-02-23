<?php

namespace App\Http\Livewire\Dashboard\Business\Subscriptions;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Rinvex\Subscriptions\Models\Plan;

class Plans extends Component
{
    public function render()
    {
        return view('livewire.dashboard.business.subscriptions.plans');
    }

    public function PayNow($planId)
    {
        if (!is_null($plan = Plan::find($planId))) {
            if (Admin::Is($plan->user_id)) {
                return redirect(route('BusinessSubscribe', $plan->price_id));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function EndSubscription($invoice)
    {
        return Business::EndSubscription(Auth::user()->id, $invoice);
    }
}
