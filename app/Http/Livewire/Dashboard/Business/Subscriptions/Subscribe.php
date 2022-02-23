<?php

namespace App\Http\Livewire\Dashboard\Business\Subscriptions;

use Exception;
use App\Helpers\Stripe;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Subscribe extends Component
{
    public $plan;

    public $card_holder_name;
    public $card_number;

    public $card_expiry_month;
    public $card_expiry_year;

    public $card_cvc;

    public function render()
    {
        return view('livewire.dashboard.business.subscriptions.subscribe')
            ->with([
                'plan' => $this->plan,
            ]);
    }

    public function PayNow()
    {
        $msg = [
            'card_holder_name.required' => 'Holder Name',
            'card_number.required' => 'Holder Number',
            'card_expiry_month.required' => 'Expiry Month',
            'card_expiry_year.required' => 'Expiry Year',
            'card_cvc.required' => 'CVC',
        ];
        $this->validate([
            'card_holder_name' => 'required|string|max:15',
            'card_number' => 'required|integer',
            'card_expiry_month' => 'required|integer|between:1,12',
            'card_expiry_year' => 'required|integer|between:1970,2050',
            'card_cvc' => 'required|integer',
        ], $msg);

        $card = [
            'name' => $this->card_holder_name,
            'number' => $this->card_number,
            'exp_month' => $this->card_expiry_month,
            'exp_year' => $this->card_expiry_year,
            'cvc' => $this->card_cvc,
        ];
        return Stripe::CardChargeForBusiness($card, $this->plan->price * 100, 'usd', Auth::user()->id, $this->plan->id);
    }
}
