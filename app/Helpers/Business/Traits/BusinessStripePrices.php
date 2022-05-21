<?php

namespace App\Helpers\Business\Traits;

use Exception;
use App\Models\StripeConfiguration;
use Illuminate\Support\Facades\Auth;

trait BusinessStripePrices
{
    /*Begin::Stripe Prices*/
    public static function Prices($load)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            return $stripe->prices->all(
                ['limit' => $load],
                ['stripe_account' => Auth::user()->account_id]
            );
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.plans-not-found'));
        }
    }

    public static function ActivePrices($load)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            return $stripe->prices->all(
                ['active' => true, 'limit' => $load],
                ['stripe_account' => Auth::user()->account_id]
            );
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.plans-not-found'));
        }
    }

    public static function CountPrices()
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            return $stripe->prices
                ->all([], ['stripe_account' => Auth::user()->account_id])->count();
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public static function CountActivePrices()
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            return $stripe->prices
                ->all(
                    ['active' => true],
                    ['stripe_account' => Auth::user()->account_id]
                )->count();
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public static function FindPrice($price)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            return $stripe->prices->retrieve(
                $price,
                [],
                ['stripe_account' => Auth::user()->account_id]
            );
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
    /*End::Stripe Prices*/
}
