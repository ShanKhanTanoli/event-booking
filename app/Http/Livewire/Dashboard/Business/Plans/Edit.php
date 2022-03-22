<?php

namespace App\Http\Livewire\Dashboard\Business\Plans;

use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Edit extends Component
{
    public $state = [];

    public $plan;

    public function mount()
    {
        $this->state = $this->plan->only([
            'name', 'description', 'reservations',
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.business.plans.edit.index');
    }
    public function UpdatePlan()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string|max:15',
            'description' => 'required|string|max:40',
        ])->validate();
        $data = [
            'name' => $validated['name'],
            'signup_fee' => 0,
            'slug' => strtoupper(Str::random(10)),
            'description' => $validated['description'],
            'reservations' => 0,
        ];
        if (Business::CanUpdatePricingPlans(Auth::user()->id)) {
            return  Business::UpdatePlan(Auth::user()->id, $this->plan->id, $data, 'Updated Successfully');
        } else return session()->flash('error', 'You are not allowed to update a Plan');
    }
}
