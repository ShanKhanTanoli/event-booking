<?php

namespace App\Http\Livewire\Dashboard\Admin\Pricingplans;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $load = 5;

    public function render()
    {
        $plans = Admin::Plans(Auth::user()->id)->take($this->load);
        return view('livewire.dashboard.admin.pricingplans.index')
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
        return redirect(route('AdminEditPricingPlan', $price_id));
    }

    public function ArchivePlan($plan_id)
    {
        Admin::UpdatePlan(Auth::user()->id, $plan_id, ['is_active' => false], 'Archived Successfully');
        return redirect(route('AdminPricingPlans'));
    }

    public function ActivatePlan($plan_id)
    {
        Admin::UpdatePlan(Auth::user()->id, $plan_id, ['is_active' => true], 'Activated Successfully');
        return redirect(route('AdminPricingPlans'));
    }
}
