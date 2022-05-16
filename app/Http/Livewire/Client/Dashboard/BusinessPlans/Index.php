<?php

namespace App\Http\Livewire\Client\Dashboard\BusinessPlans;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }

    public function render()
    {
        $plans = Business::ActivePlansLastPaginate(Auth::user()->parent_business_id, 10);
        return view('livewire.client.dashboard.business-plans.index')
            ->with(['plans' => $plans])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Subscribe($slug)
    {
        if ($user = User::find(Auth::user()->parent_business_id)) {
            if ($plan = Business::FindActivePlanBySlug($user->id, $slug)) {
                return redirect(route('ClientSubscribe', ['slug' => $plan->slug, 'lang' => App::getLocale()]));
            } else {
                return session()->flash('error', trans('alerts.error'));
            }
        } else {
            return session()->flash('error', trans('alerts.error'));
        }
    }
}
