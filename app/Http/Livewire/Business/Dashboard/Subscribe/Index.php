<?php

namespace App\Http\Livewire\Business\Dashboard\Subscribe;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Helpers\Stripe\Stripe;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $price, $product, $card_holder_name, $card_number, $card_expiry, $card_cvc;

    public function mount($price)
    {
        //If Price found
        if ($find = Admin::FindPrice($price)) {
            $this->price = $find->id;
            $this->product = $find->product;
        } else {
            //If Platform plans not found
            session()->flash('error', trans('alerts.error'));
            return redirect(route('BusinessPlatformPlans', ['lang' => App::getLocale()]));
        }
    }

    public function render()
    {
        return view('livewire.business.dashboard.subscribe.index')
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
        //If Price found
        if ($find = Admin::FindPrice($this->price)) {
            //If Price is recurring
            if ($find->type == "recurring") {
                Stripe::CashierSubscribe($user, $card, $this->product, $this->price);
                session()->flash('success', trans('alerts.subscribe'));
                return redirect(route('BusinessSubscriptions', ['lang' => App::getLocale()]));
            }
            //If Price is one_time
            if ($find->type == "one_time") {
                session()->flash('error', trans('alerts.error'));
                return redirect(route('BusinessPlatformPlans', ['lang' => App::getLocale()]));
                //return Stripe::CashierSingleCharge($user, $card, $this->product, $find->unit_amount);
            }
            //If Something else
            session()->flash('error', trans('alerts.error'));
            return redirect(route('BusinessPlatformPlans', ['lang' => App::getLocale()]));
        } else {
            //If Platform plans not found
            session()->flash('error', trans('alerts.error'));
            return redirect(route('BusinessPlatformPlans', ['lang' => App::getLocale()]));
        }
    }
}
