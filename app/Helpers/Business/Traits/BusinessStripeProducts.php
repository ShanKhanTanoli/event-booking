<?php

namespace App\Helpers\Business\Traits;

use Exception;
use App\Helpers\Business\Business;
use App\Models\StripeConfiguration;
use Illuminate\Support\Facades\Auth;

trait BusinessStripeProducts
{
    /*Begin::Products*/
    public static function Products($load)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            return $stripe->products->all(['limit' => $load],['stripe_account' => Auth::user()->account_id]);
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.plans-not-found'));
        }
    }

    public static function ActiveProducts($load)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            return $stripe->products->all(['active' => true, 'limit' => $load], ['stripe_account' => Auth::user()->account_id]);
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.plans-not-found'));
        }
    }

    public static function CountProducts()
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            return $stripe->products
                ->all([], ['stripe_account' => Auth::user()->account_id])->count();
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }


    public static function CountActiveProducts()
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            //List Products
            return $stripe->products
                ->all(
                    ['active' => true],
                    ['stripe_account' => Auth::user()->account_id]
                )->count();
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public static function FindProduct($product)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            //Retrieve a Product
            return $stripe->products->retrieve(
                $product,
                [],
                ['stripe_account' => Auth::user()->account_id]
            );
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public static function ArchiveProduct($product)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            //Update a Product
            return $stripe->products->update(
                $product,
                ['active' => false],
                ['stripe_account' => Auth::user()->account_id]
            );
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public static function ActivateProduct($product)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            //Update a Product
            return $stripe->products->update(
                $product,
                ['active' => true],
                ['stripe_account' => Auth::user()->account_id]
            );
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }

    public static function UpdateProduct($product, $name, $description)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            //Update a Product
            return $stripe->products->update(
                $product,
                [
                    'name' => $name,
                    'description' => $description,
                ],
                ['stripe_account' => Auth::user()->account_id]
            );
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
    /*End::Products*/

    /*Begin::Products with prices*/
    public static function AddOneTimeProductWithPrice($name, $description = null, $amount)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            //Create Product
            $product = $stripe->products->create([
                'name' => $name,
                'description' => $description,
            ], ['stripe_account' => Auth::user()->account_id]);
            //Create Prices
            return $stripe->prices->create([
                'unit_amount' => $amount * 100,
                'currency' => Business::Currency(Auth::user()->id),
                'product' => $product->id,
            ], ['stripe_account' => Auth::user()->account_id]);
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
    public static function AddRecurringProductWithPrice($name, $description = null, $amount, $interval_count, $interval)
    {
        try {
            $skey = StripeConfiguration::first()->secret_key;
            $stripe = new \Stripe\StripeClient(
                $skey
            );
            //Create Product
            $product = $stripe->products->create([
                'name' => $name,
                'description' => $description,
            ], ['stripe_account' => Auth::user()->account_id]);
            //Create Price
            return $stripe->prices->create(
                [
                    'unit_amount' => $amount * 100,
                    'currency' => Business::Currency(Auth::user()->id),
                    'recurring' => [
                        'interval_count' => $interval_count,
                        'interval' => $interval,
                    ], 'product' => $product->id
                ],
                ['stripe_account' => Auth::user()->account_id]
            );
        } catch (Exception $e) {
            return session()->flash('error', trans('alerts.error'));
        }
    }
    /*End::Products with prices*/
}
