<?php

namespace App\Http\Livewire\Admin\Dashboard\Plans\Edit;

use Exception;
use Stripe\Plan;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Helpers\Stripe\Stripe;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $plan, $name, $amount, $interval_count, $interval;

    public function mount($slug)
    {
        App::setLocale(Admin::Language());

        if ($plan = Admin::FindPlanBySlug(Auth::user()->id, $slug)) {

            $this->plan = $plan;

            $this->name = $plan->name;
            $this->amount = $plan->amount;
            $this->interval_count = $plan->interval_count;
            $this->interval = $plan->interval;
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminPlans', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.plans.edit.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
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
                //Update Plan
                $plan = Plan::update($this->plan->plan_id, [
                    'amount' => ($validated['amount'] * 100),
                    'currency' => Admin::Currency(),
                    'interval_count' => $validated['interval_count'],
                    'interval' => $validated['interval'],
                    'product' => [
                        'id' => $this->plan->plan_id,
                        'name' => $validated['name']
                    ],
                ]);
                //Update plan in database also
                $this->plan->update([
                    'name' => $validated['name'],
                    'plan_id' => $plan->id,
                    'active' => $plan->active,
                    'amount' => $plan->amount / 100,
                    'amount_decimal' => $plan->amount_decimal / 100,
                    'currency' => $plan->currency,
                    'interval' => $plan->interval,
                    'interval_count' => $plan->interval_count,
                    'product_id' => $plan->product,
                ]);
                session()->flash('success', trans('alerts.update'));
                return redirect(route('AdminPlans', App::getLocale()));
            }
            //If Secret Key Not Found
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminEditPlan', ['slug' => $this->plan->slug, 'lang' => App::getLocale()]));
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminEditPlan', ['slug' => $this->plan->slug, 'lang' => App::getLocale()]));
        }
    }
}
