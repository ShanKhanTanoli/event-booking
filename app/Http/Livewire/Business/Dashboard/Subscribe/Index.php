<?php

namespace App\Http\Livewire\Business\Dashboard\Subscribe;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Helpers\Stripe\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $plan, $card_holder_name, $card_number, $card_expiry, $card_cvc;
    public function mount($slug, $lang = "en")
    {
        App::setLocale($lang);
        //If Admin is Available
        if ($admin = Admin::ID()) {
            //If Plan found
            if ($plan = Admin::FindActivePlanBySlug($admin->id, $slug)) {
                $this->plan = $plan;
            } else {
                //If Plan not found
                session()->flash('error', trans('alerts.error'));
                return redirect(route('BusinessPlatformPlans', ['lang' => App::getLocale()]));
            }
        } else {
            //If Admin is not Available
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public function render()
    {
        $intent = Auth::user()->createSetupIntent();
        return view('livewire.business.dashboard.subscribe.index')
            ->with(['intent' => $intent])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function PayNow()
    {
        $user = Auth::user();

        //Create or get customer
        $stripeCustomer = $user->createOrGetStripeCustomer();

        $card = $this->validate([
            'card_holder_name' => 'required|string',
            'card_number' => 'required|numeric',
            'card_expiry' => 'required|date',
            'card_cvc' => 'required|string',
        ]);

        return Stripe::CashierSubscribe($customer,$card,$this->plan);

    }

    public function FreePlan()
    {
    }
}
