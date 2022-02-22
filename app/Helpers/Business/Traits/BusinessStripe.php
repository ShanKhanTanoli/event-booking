<?php

namespace App\Helpers\Business\Traits;

use Exception;
use App\Helpers\Stripe;
use Illuminate\Support\Str;
use App\Helpers\Business\Traits\BusinessPlans;
use App\Helpers\Business\Traits\BusinessStripeAccount;

trait BusinessStripe
{
    use BusinessStripeAccount, BusinessPlans;

    public static function StripeClient()
    {
        if ($stripe = Stripe::Client()) {
            return $stripe;
        } else return false;
    }

    public static function StripeConnectAccountID($user)
    {
        if ($business = self::Is($user)) {
            if (!is_null($business->account_id)) {
                return $business->account_id;
            } else return false;
        } else return false;
    }

    public static function BecomeCustomer($user)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($business = self::Is($user)) {
                    $customer = $stripe->customers->create([
                        'name' => $business->name,
                        'email' => $business->email,
                        'phone' => $business->phone,
                    ]);
                    $business->update(['customer_id' => $customer->id]);
                    return $customer;
                } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
            } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        }
    }

    public static function IsCustomer($user)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($business = self::Is($user)) {
                    $customer = $stripe->customers->retrieve(
                        $business->customer_id,
                        []
                    );
                    return $customer;
                } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
            } else return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\RateLimitException $e) {
            return session()->flash('error', 'Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return session()->flash('error', $e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return session()->flash('error', 'You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        } catch (Exception $e) {
            return session()->flash('error', 'Something went Wrong.Please refresh the page and try again later.');
        }
    }

    public static function PaySubscribe($user, $amount, $currency, $token, $plan)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($business = self::Is($user)) {
                    $charge = $stripe->charges->create([
                        'amount' => $amount,
                        'currency' => $currency,
                        'source' => $token,
                        'description' => 'Business '.$business->name.' & '.$business->email.' Changed Plan',
                    ]);
                    self::CreateSubscription(
                        $business->id,
                        $charge->stripe_charge_id,
                        Str::random(10),
                        $plan
                    );
                    return 'Subscribed Successfully';
                } else return 'Something went Wrong.Please refresh the page and try again later.';
            } else return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\RateLimitException $e) {
            return ('Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return ($e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return ('You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (Exception $e) {
            return ('Something went Wrong.Please refresh the page and try again later.');
        }
    }

    public static function PayChangePlan($user, $amount, $currency, $token, $plan, $subscription,$connect_account)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($business = self::Is($user)) {
                    $stripe->charges->create([
                        'amount' => $amount,
                        'currency' => $currency,
                        'source' => $token,
                        'description' => 'Business '.$business->name.' & '.$business->email.' Changed Plan',
                    ],[$connect_account]);
                    self::ChangePlan($business->id, $plan, $subscription);
                    return 'Plan Changed Successfully';
                } else return 'Something went Wrong.Please refresh the page and try again later.';
            } else return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\RateLimitException $e) {
            return ('Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return ($e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return ('You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (Exception $e) {
            return ('Something went Wrong.Please refresh the page and try again later.');
        }
    }
}
