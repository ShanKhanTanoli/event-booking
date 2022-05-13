<?php

namespace App\Http\Livewire\Business\Dashboard\Plans\Add;

use Exception;
use Stripe\Plan;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Admin\Admin;
use App\Helpers\Stripe\Stripe;
use App\Models\Plan as PlanModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $name, $amount, $interval_count, $interval;

    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }

    public function render()
    {
        return view('livewire.business.dashboard.plans.add.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Add()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'interval_count' => 'required|numeric',
            'interval' => 'required|string|in:day,week,month,year',
        ]);

        try {
            $secrey_key = Stripe::SecretKey();
            if ($secrey_key) {
                //Set Api Key
                \Stripe\Stripe::setApiKey($secrey_key);
                //Create Plan
                $plan = Plan::create([
                    'amount' => ($validated['amount'] * 100),
                    'currency' => Admin::Currency(),
                    'interval_count' => $validated['interval_count'],
                    'interval' => $validated['interval'],
                    'product' => [
                        'name' => $validated['name'],
                    ],
                ]);
                //Save Plan to Database
                PlanModel::create([
                    'name' => $validated['name'],
                    'user_id' => Auth::user()->id,
                    'plan_id' => $plan->id,
                    'active' => $plan->active,
                    'amount' => $plan->amount / 100,
                    'amount_decimal' => $plan->amount_decimal / 100,
                    'currency' => $plan->currency,
                    'interval' => $plan->interval,
                    'interval_count' => $plan->interval_count,
                    'product_id' => $plan->product,
                    'slug' => strtoupper(Str::random(10)),
                ]);
                session()->flash('success', trans('alerts.add'));
                return redirect(route('BusinessPlans', App::getLocale()));
            }
            //If Secret Key Not Found
            session()->flash('error', trans('alerts.error'));
            return redirect(route('BusinessAddPlan', App::getLocale()));
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('BusinessAddPlan', App::getLocale()));
        }
    }
}
