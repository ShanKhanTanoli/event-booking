<?php

namespace App\Http\Livewire\Dashboard\Admin\Pricingplans;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class Plans extends Component
{
    public $load = 5;

    public function render()
    {
        $plans = Admin::Plans(Auth::user()->id)->take($this->load);
        return view('livewire.dashboard.admin.pricingplans.plans')
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
    }

    public function ActivatePlan($plan_id)
    {
        Admin::UpdatePlan(Auth::user()->id, $plan_id, ['is_active' => true], 'Activated Successfully');
    }
}
