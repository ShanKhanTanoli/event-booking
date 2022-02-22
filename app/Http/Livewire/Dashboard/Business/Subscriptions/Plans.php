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

    public function ChangePlan($planId)
    {
        if (!is_null($plan = Plan::find($planId))) {
            if (Admin::Is($plan->user_id)) {
                if ($sub = Business::HasActiveSubscription(Auth::user()->id)) {
                    //dd($sub);
                    Business::ChangePlan(Auth::user()->id, $planId, $sub->id);
                    return session()->flash('success', 'Changed Succesfully');
                    //return redirect(route('BusinessChangePlan', $plan->price_id));
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function PayNow($planId)
    {
        if (!is_null($plan = Plan::find($planId))) {
            if (Admin::Is($plan->user_id)) {
                //dd($planId);
                Business::CreateSubscription(Auth::user()->id, mt_rand(1, 9999999), 'abc', $planId);
                return session()->flash('success', 'Succesfully Subscribed');
                return redirect(route('BusinessSubscribe', $plan->price_id));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function EndSubscription($invoice)
    {
        return Business::EndSubscription(Auth::user()->id, $invoice);
    }
}
