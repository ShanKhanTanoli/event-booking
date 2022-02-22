<?php

namespace App\Http\Livewire\Dashboard\Business\Plans;

use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    public $state = [];

    public function render()
    {
        return view('livewire.dashboard.business.plans.create');
    }
    public function CreatePlan()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string|max:15',
            'price' => 'required|numeric',
            'invoice_period' => 'required|numeric',
            'invoice_interval' => 'required|string|in:day,month',
            'description' => 'required|string|max:40',
            'reservations' => 'required|numeric',
        ])->validate();
        $data = [
            'user_id' => Auth::user()->id,
            'price_id' => 'price_' . Str::random(30),
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'signup_fee' => 0,
            'invoice_period' => $validated['invoice_period'],
            'invoice_interval' => $validated['invoice_interval'],
            'currency' => 'USD',
            'reservations' => $validated['reservations'],
        ];
        try {
            if(Business::CanCreatePricingPlans(Auth::user()->id)){
            app('rinvex.subscriptions.plan')->create($data);
            return session()->flash('success', 'Plan Created Successfully');
            }else return session()->flash('error', 'You are not allowed to create Plans');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went wrong');
        }
    }
}
