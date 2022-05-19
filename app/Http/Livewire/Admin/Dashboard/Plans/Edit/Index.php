<?php

namespace App\Http\Livewire\Admin\Dashboard\Plans\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $product, $name, $description;

    public function mount($product)
    {
        App::setLocale(Admin::Language());

        if ($find = Admin::FindProduct($product)) {
            $this->product = $find->id;
            $this->name = $find->name;
            $this->description = $find->description;
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminPlans', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.plans.edit.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Update()
    {
        $validated = $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        try {
            Admin::UpdateProduct($this->product, $validated['name'], $validated['description']);
            session()->flash('success', trans('alerts.update'));
            return redirect(route('AdminEditPlan', ['product' => $this->product, 'lang' => App::getLocale()]));
        } catch (Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect(route('AdminEditPlan', ['product' => $this->product, 'lang' => App::getLocale()]));
        }
    }
}
