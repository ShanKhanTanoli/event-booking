<?php

namespace App\Http\Livewire\Admin\Dashboard\Plans\Add;

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
    public $validated, $name, $amount, $description, $interval_count, $interval, $plan_type;


    public function mount()
    {
        App::setLocale(Admin::Language());
    }

    public function render()
    {
        return view('livewire.admin.dashboard.plans.add.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Add()
    {

        //One Time
        if ($this->plan_type == "onetime") {
            $validated = $this->validate([
                'name' => 'required|string',
                'amount' => 'required|numeric',
                'description' => 'required|string',
            ]);

            $this->validated = $validated;
        }

        //Recurring
        if ($this->plan_type == "recurring") {
            $validated = $this->validate([
                'name' => 'required|string',
                'amount' => 'required|numeric',
                'description' => 'required|string',
                'interval_count' => 'required|numeric',
                'interval' => 'required|string|in:day,week,month,year',
            ]);
            $this->validated = $validated;
        }

        try {
            //If plan type is selected
            if ($this->plan_type) {
                //Create Product with onetime pricing 
                if ($this->plan_type == "onetime") {
                    $name = $validated['name'];
                    $description = $validated['description'];
                    $amount = $validated['amount'];
                    Admin::AddOneTimeProductWithPrice($name, $description, $amount);
                    session()->flash('success', trans('alerts.add'));
                    return redirect(route('AdminPlans', App::getLocale()));
                }
                //Create Product with recurring pricing 
                if ($this->plan_type == "recurring") {
                    $name = $validated['name'];
                    $description = $validated['description'];
                    $amount = $validated['amount'];
                    $interval_count = $validated['interval_count'];
                    $interval = $validated['interval'];
                    Admin::AddRecurringProductWithPrice($name, $description, $amount, $interval_count, $interval);
                    session()->flash('success', trans('alerts.add'));
                    return redirect(route('AdminPlans', App::getLocale()));
                }
            } else {
                //If plan type is not selected
                session()->flash('error', trans('alerts.select-plan-type'));
                return redirect(route('AdminAddPlan', App::getLocale()));
            }
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminAddPlan', App::getLocale()));
        }
    }
}
