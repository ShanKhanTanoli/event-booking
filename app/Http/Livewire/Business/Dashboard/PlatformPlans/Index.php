<?php

namespace App\Http\Livewire\Business\Dashboard\PlatformPlans;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }

    public function render()
    {
        $plans = Admin::ActivePlansLastPaginate(Admin::ID()->id, 10);
        return view('livewire.business.dashboard.platform-plans.index')
            ->with(['plans' => $plans])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Subscribe($slug)
    {
        if ($admin = Admin::ID()) {
            if ($plan = Admin::FindActivePlanBySlug($admin->id, $slug)) {
                return redirect(route('BusinessSubscribe', ['slug' => $plan->slug, 'lang' => App::getLocale()]));
            } else {
                return session()->flash('error', trans('alerts.error'));
            }
        } else {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
