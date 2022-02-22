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
            'name', 'description','reservations',
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.business.plans.edit');
    }
    public function UpdatePlan()
    {
            $validated = Validator::make($this->state, [
                'name' => 'required|string|max:15',
                'description' => 'required|string|max:40',
                'reservations' => 'required|numeric',
            ])->validate();
            $data = [
                'name' => $validated['name'],
                'slug' => Str::slug($validated['name'] . '-' . mt_rand(1, 100), '-'),
                'description' => $validated['description'],
                'reservations' => $validated['reservations'],
            ];
            try {
                if(Business::CanUpdatePricingPlans(Auth::user()->id)){
                return  Business::UpdatePlan(Auth::user()->id, $this->plan->id, $data,'Updated Successfully');
                
            }else return session()->flash('error', 'You are not allowed to update a Plan');
            } catch (Exception $e) {
                return session()->flash('error', 'Something went wrong');
            }
    }
}
