<?php

namespace App\Http\Livewire\Dashboard\Client\Subscriptions;

use App\Helpers\Stripe;
use Livewire\Component;
use App\Helpers\Client\Client;
use App\Helpers\Business\Business;
use App\Helpers\Settings;
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
        return view('livewire.dashboard.client.subscriptions.subscribe')
            ->with([
                'plan' => $this->plan,
            ]);;
    }

    public function PayNow()
    {
        $user = Auth::user();
        if ($business = Client::JoinedBusiness($user->id)) {
            if ($account_id = Business::StripeConnectAccountID($business->id)) {
                if ($stripe = Stripe::RetrieveAccount($account_id)) {
                    if ($stripe->charges_enabled && $stripe->details_submitted && $stripe->payouts_enabled) {
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

                        //Calculate Fee
                        $application_fee_amount = Settings::CalculateFees($this->plan->price);
                        //Calculate Fee
                        $amount = $this->plan->price + $application_fee_amount;
                        $plan = $this->plan->id;

                        return Stripe::CardChargeForClient($card, $amount*100, Settings::Currency(), $application_fee_amount*100, $account_id, $user->id, $plan);
                    } else return session()->flash('error', 'contact your business owner.');
                } else return session()->flash('error', 'contact your business owner.');
            } else return session()->flash('error', 'contact your business owner.');
        } else return session()->flash('error', 'something went wrong.');
    }
}
