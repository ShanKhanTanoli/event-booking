<?php

namespace App\Http\Livewire\Admin\Dashboard\Subscriptions;

use Livewire\Component;
use Livewire\WithPagination;
use Laravel\Cashier\Subscription;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $subscriptions = Subscription::query()->paginate(10);
        return view('livewire.admin.dashboard.subscriptions.index')
            ->with(['subscriptions' => $subscriptions])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Cancel($name)
    {
        $user = Auth::user();
        if ($subscription = Business::FindSubscription($user, $name)) {
            if (!$user->subscription($subscription->name)->ended()) {
                $user->subscription($subscription->name)->cancel();
                return session()->flash('success', trans('alerts.cancel'));
            } else return session()->flash('error', trans('alerts.error'));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Resume($name)
    {
        $user = Auth::user();
        if ($subscription = Business::FindSubscription($user, $name)) {
            if (!$user->subscription($subscription->name)->ended()) {
                $user->subscription($subscription->name)->resume();
                return session()->flash('success', trans('alerts.resume'));
            } else return session()->flash('error', trans('alerts.error'));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function End($name)
    {
        $user = Auth::user();
        if ($subscription = Business::FindSubscription($user, $name)) {
            if (!$user->subscription($subscription->name)->ended()) {
                $user->subscription($subscription->name)->cancelNow();
                return session()->flash('success', trans('alerts.end'));
            } else return session()->flash('error', trans('alerts.error'));
        } else return session()->flash('error', trans('alerts.error'));
    }
}
