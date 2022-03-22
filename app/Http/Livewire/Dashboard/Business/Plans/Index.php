<?php

namespace App\Http\Livewire\Dashboard\Business\Plans;

use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $load = 5;

    public function render()
    {
        if($plans = Business::Plans(Auth::user()->id)){
            $plans = $plans->take($this->load);
        }else $plans = [];
        return view('livewire.dashboard.business.plans.index')
        ->with([
            'plans' => $plans,
        ]);
    }

    public function LoadMore()
    {
        $this->load += 3;
    }

    public function EditPlan($price_id)
    {
        if($plan = Business::PlanFindByPriceId(Auth::user()->id,$price_id)){
            return redirect(route('BusinessEditPricingPlan',$plan->price_id));
        }else return session()->flash('error', 'something went wrong');
    }

    public function ArchivePlan($plan_id)
    {
        Business::UpdatePlan(Auth::user()->id, $plan_id, ['is_active' => false],'Archived Successfully');
    }

    public function ActivatePlan($plan_id)
    {
        Business::UpdatePlan(Auth::user()->id, $plan_id, ['is_active' => true],'Activated Successfully');
    }
}
