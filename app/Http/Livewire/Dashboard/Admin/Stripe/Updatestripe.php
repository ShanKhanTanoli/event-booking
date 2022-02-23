<?php

namespace App\Http\Livewire\Dashboard\Admin\Stripe;

use Livewire\Component;
use App\Models\PaymentGateway;
use Illuminate\Support\Facades\Validator;

class Updatestripe extends Component
{
    public $state = [];

    public $data = [];

    public function mount()
    {
        if (!is_null($stripe = PaymentGateway::first())) {
            $this->state = $stripe->only([
                'public_key',
                'secret_key',
                'payment_mode',
            ]);
        }
    }

    public function render()
    {
        $stripe = PaymentGateway::first();
        return view('livewire.dashboard.admin.stripe.updatestripe')
            ->with([
                'stripe' => $stripe,
            ]);
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'public_key' => 'required|string',
            'secret_key' => 'required|string',
            'payment_mode' => 'required|string|in:live,test',
        ])->validate();

        if (!is_null($stripe = PaymentGateway::first())) {
            $stripe->update($validated);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Create()
    {
        $validated = Validator::make($this->state, [
            'public_key' => 'required|string',
            'secret_key' => 'required|string',
            'payment_mode' => 'required|string|in:live,test',
        ])->validate();

        if (PaymentGateway::create($validated)) {
            session()->flash('success', 'Successfully Created');
        } else session()->flash('error', 'Something went wrong!');
    }
}
