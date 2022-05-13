<?php

namespace App\Http\Livewire\Business\Dashboard\Plans;

use Stripe\Plan;
use Livewire\Component;
use App\Helpers\Business\Business;
use Livewire\WithPagination;
use App\Helpers\Stripe\Stripe;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $delete;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }

    public function render()
    {
        $plans = Business::PlansLatestPaginate(Auth::user()->id, 10);
        return view('livewire.business.dashboard.plans.index')
            ->with(['plans' => $plans])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Edit($id)
    {
        if ($plan = Business::FindPlan(Auth::user()->id, $id)) {
            return redirect(route('BusinessEditPlan', ['slug' => $plan->slug, 'lang' => App::getLocale()]));
        }
        return session()->flash('error', trans('alerts.error'));
    }

    public function DeleteConfirmation($id)
    {
        if ($plan = Business::FindPlan(Auth::user()->id, $id)) {
            $this->delete = $plan;
            $this->emit(['delete']);
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Delete($id)
    {
        if ($plan = Business::FindPlan(Auth::user()->id, $id)) {
            $secrey_key = Stripe::SecretKey();
            if ($secrey_key) {
                //Set Api Key
                \Stripe\Stripe::setApiKey($secrey_key);
                //Create Plan
                Plan::update($plan->plan_id, [
                    'active' => false,
                ]);
                $plan->update([
                    'active' => 0,
                ]);
                session()->flash('success', trans('alerts.archive'));
                return redirect(route('BusinessPlans', App::getLocale()));
            } //If Secret Key Not Found
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminAddPlan', App::getLocale()));
        }
        return session()->flash('error', trans('alerts.error'));
    }

    public function ActivatePlan($id)
    {
        if ($plan = Business::FindPlan(Auth::user()->id, $id)) {
            $secrey_key = Stripe::SecretKey();
            if ($secrey_key) {
                //Set Api Key
                \Stripe\Stripe::setApiKey($secrey_key);
                //Create Plan
                Plan::update($plan->plan_id, [
                    'active' => true,
                ]);
                $plan->update([
                    'active' => 1,
                ]);
                session()->flash('success', trans('alerts.archive'));
                return redirect(route('AdminPlans', App::getLocale()));
            } //If Secret Key Not Found
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminAddPlan', App::getLocale()));
        }
        return session()->flash('error', trans('alerts.error'));
    }
}
