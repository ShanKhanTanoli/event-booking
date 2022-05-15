<?php

namespace App\Http\Livewire\Business\Dashboard\Subscriptions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use FrittenKeeZ\Vouchers\Models\Voucher;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $subscriptions = Business::SubscriptionsLatestPaginate(Auth::user(), 10);
        return view('livewire.business.dashboard.subscriptions.index')
            ->with(['subscriptions' => $subscriptions])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Cancel($stripe_price)
    {
        $user = Auth::user();

        if ($subscription = Business::FinSubscription($user, $stripe_price)) {

            dd($user->subscription('plan_LgI7p6DEHq0b4N')->onGracePeriod());

            if ($user->subscription($subscription->name)->onGracePeriod()) {

                $user->subscription($subscription->stripe_price)->cancel();
                session()->flash('success', trans('alerts.canceled'));
                return redirect(route('BusinessSubscriptions', App::getLocale()));

            } else return session()->flash('error', trans('alerts.error'));


        } else return session()->flash('error', trans('alerts.error'));
    }

    public function CancelNow($stripe_price)
    {
        $user = Auth::user();

        // if ($user->subscription($subscription)->onGracePeriod()) {

        //     $user->subscription($subscription)->cancelNow();

        // }
    }

    public function Resume($stripe_price)
    {
        // $user->subscription($subscription)->resume();
    }
}
