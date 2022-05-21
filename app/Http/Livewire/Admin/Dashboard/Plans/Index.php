<?php

namespace App\Http\Livewire\Admin\Dashboard\Plans;

use Stripe\Plan;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Helpers\Stripe\Stripe;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $delete;
    public $load = 3;

    public function mount()
    {
        App::setLocale(Admin::Language());
    }

    public function render()
    {
        $prices = Admin::ActivePrices($this->load);
        return view('livewire.admin.dashboard.plans.index')
            ->with(['prices' => $prices])
            ->extends('layouts.dashboard')
            ->section('content');
    }


    public function Edit($id)
    {
        if ($price = Admin::FindPrice($id)) {
            return redirect(route('AdminEditPlan', ['product' => $price->product, 'lang' => App::getLocale()]));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Archive($id)
    {
        if ($price = Admin::FindPrice($id)) {
            Admin::ArchiveProduct($price->product);
            session()->flash('success', trans('alerts.archive'));
            return redirect(route('AdminPlans', App::getLocale()));
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminPlans', App::getLocale()));
        }
    }

    public function Activate($id)
    {
        if ($price = Admin::FindPrice($id)) {
            Admin::ActivateProduct($price->product);
            session()->flash('success', trans('alerts.activate'));
            return redirect(route('AdminPlans', App::getLocale()));
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminPlans', App::getLocale()));
        }
    }

    public function LoadMore()
    {
        $this->load += 3;
    }
}
