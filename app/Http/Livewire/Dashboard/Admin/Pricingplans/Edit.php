<?php

namespace App\Http\Livewire\Dashboard\Admin\Pricingplans;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Admin\Admin;
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
        return view('livewire.dashboard.admin.pricingplans.edit');
    }

    public function UpdatePlan()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string|max:15',
            'description' => 'required|string|max:30',
            'reservations' => 'required|numeric',
        ])->validate();
        if ($plan = Admin::PlanFindByPriceId(Auth::user()->id, $this->plan->price_id)) {
            Admin::UpdatePlan(Auth::user()->id, $plan->id, $validated, 'Updated Successfully');
        } else return session()->flash('error', 'something went wrong');
    }
}
