<?php

namespace App\Http\Livewire\Client\Dashboard\Subscriptions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $subscriptions = Client::SubscriptionsLatestPaginate(Auth::user(), 10);
        return view('livewire.client.dashboard.subscriptions.index')
            ->with(['subscriptions' => $subscriptions])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Cancel($name)
    {
        $user = Auth::user();

        if ($subscription = Client::FindSubscription($user, $name)) {


            if (!$user->subscription($subscription->name)->ended()) {

                $user->subscription($subscription->name)->cancel();
                session()->flash('success', trans('alerts.canceled'));
                return redirect(route('ClientSubscriptions', App::getLocale()));
            } else return session()->flash('error', trans('alerts.error'));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Resume($name)
    {
        $user = Auth::user();

        if ($subscription = Client::FindSubscription($user, $name)) {

            if (!$user->subscription($subscription->name)->ended()) {

                $user->subscription($subscription->name)->resume();
                session()->flash('success', trans('alerts.resume'));
                return redirect(route('ClientSubscriptions', App::getLocale()));
            } else return session()->flash('error', trans('alerts.error'));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function End($name)
    {
        $user = Auth::user();

        if ($subscription = Client::FindSubscription($user, $name)) {

            if (!$user->subscription($subscription->name)->ended()) {

                $user->subscription($subscription->name)->cancelNow();
                session()->flash('success', trans('alerts.canceled'));
                return redirect(route('ClientSubscriptions', App::getLocale()));
            } else return session()->flash('error', trans('alerts.error'));
        } else return session()->flash('error', trans('alerts.error'));
    }
}
