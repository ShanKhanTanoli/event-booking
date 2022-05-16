<?php

namespace App\Http\Livewire\Client\Dashboard\Subscribe;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Client\Client;
use App\Helpers\Stripe\Stripe;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $plan, $card_holder_name, $card_number, $card_expiry, $card_cvc;
    public function mount($slug)
    {
        App::setLocale(Client::Language(Auth::user()->id));
        //If Business is Available
        if ($business = User::find(Auth::user()->parent_business_id)) {
            //If Plan found
            if ($plan = Business::FindActivePlanBySlug($business->id, $slug)) {
                $this->plan = $plan;
            } else {
                //If Plan not found
                session()->flash('error', trans('alerts.error'));
                return redirect(route('ClientBusinessPlans', ['lang' => App::getLocale()]));
            }
        } else {
            //If Admin is not Available
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public function render()
    {
        $intent = Auth::user()->createSetupIntent();
        return view('livewire.client.dashboard.subscribe.index')
            ->with(['intent' => $intent])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function PayNow()
    {
        $user = Auth::user();
        $card = $this->validate([
            'card_holder_name' => 'required|string',
            'card_number' => 'required|numeric',
            'card_expiry' => 'required|date',
            'card_cvc' => 'required|string',
        ]);

        return Stripe::CashierSubscribe($user, $card, $this->plan);
    }
}
