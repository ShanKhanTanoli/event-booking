<?php

namespace App\Http\Livewire\Dashboard\Admin\Pricingplans;

use Exception;
use Livewire\Component;
use App\Helpers\Settings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Rinvex\Subscriptions\Models\Plan;
use Illuminate\Support\Facades\Validator;

class Add extends Component
{
    public $state = [];

    public function render()
    {
        return view('livewire.dashboard.admin.pricingplans.add.index');
    }
    public function CreatePlan()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string|max:30',
            'price' => 'required|numeric',
            'invoice_period' => 'required|numeric',
            'invoice_interval' => 'required|string|in:day,month',
            'description' => 'required|string|max:40',
        ])->validate();

        try {
            $data = [
                'user_id' => Auth::user()->id,
                'price_id' => 'price_' . strtoupper(Str::random(30)),
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'signup_fee' => 0,
                'invoice_period' => $validated['invoice_period'],
                'invoice_interval' => $validated['invoice_interval'],
                'currency' =>  strtoupper(Settings::Currency()),
            ];
            Plan::create($data);
            return session()->flash('success', 'Created Successfully');
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
