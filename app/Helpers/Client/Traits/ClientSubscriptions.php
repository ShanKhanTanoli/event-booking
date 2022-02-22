<?php

namespace App\Helpers\Client\Traits;

use Exception;
use App\Helpers\Stripe;
use Illuminate\Support\Str;
use Rinvex\Subscriptions\Models\Plan;

trait ClientSubscriptions
{

    public static function Subscriptions($user)
    {
        return app('rinvex.subscriptions.plan_subscription')
            ->ofSubscriber($user);
    }

    public static function CountSubscriptions($user)
    {
        return app('rinvex.subscriptions.plan_subscription')
            ->ofSubscriber($user)->count();
    }

    public static function CreateSubscription($user, $stripe_charge_id, $name, $plan)
    {
        if ($business = self::Is($user)) {
            if (!is_null($plan = app('rinvex.subscriptions.plan')->find($plan))) {
                try {
                    $business->newPlanSubscription($stripe_charge_id, $name, $plan, $business->reg_no);
                    return session()->flash('success', 'Subscribed Successfully');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public static function EndSubscription($user, $invoice)
    {
        if ($business = self::Is($user)) {
            try {
                if (!is_null($sub = $business->planSubscription($invoice))) {
                    $sub->cancel(true);
                    return session()->flash('success', 'Ended Successfully');
                } else throw new Exception('Something went wrong');
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else return session()->flash('error', 'Something went wrong');
    }

    public static function HasActiveSubscription($user)
    {
        if ($business = self::Is($user)) {
            $model = app('rinvex.subscriptions.plan_subscription');
            if (!is_null($subs = $model->ActiveSubscriptionOfSubscriber($business)->first())) {
                return $subs;
            } else return false;
        } else return false;
    }

    public static function ReservationsLimit($user)
    {
        if ($business = self::Is($user)) {
            $model = app('rinvex.subscriptions.plan_subscription');
            if (!is_null($subs = $model->ActiveSubscriptionOfSubscriber($business)->first())) {
                if (!is_null($limit = Plan::find($subs->plan_id))) {
                    return $limit->reservations;
                } else return 0;
            } else return 0;
        } else return 0;
    }

    public static function PaySubscribe($user, $amount, $currency, $token, $application_fee_amount, $plan, $connect_account)
    {
        try {
            if ($stripe = Stripe::Client()) {
                if ($client = self::Is($user)) {
                    $charge = $stripe->charges->create([
                        'amount' => $amount,
                        'currency' => $currency,
                        'source' => $token,
                        'application_fee_amount' => 1,
                        'description' => 'Client ' . $client->name . ' & ' . $client->email . ' Subscribed Plan',
                    ], ['stripe_account' => $connect_account]);
                    self::CreateSubscription(
                        $client->id,
                        $charge->stripe_charge_id,
                        Str::random(10),
                        $plan,
                    );
                    return 'Subscribed Successfully';
                } else return 'Something went Wrong.Please refresh the page and try again later.';
            } else return ('Something went Wrong.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\CardException $e) {
            return ($e->getMessage());
        } catch (\Stripe\Exception\RateLimitException $e) {
            return ('Too many requests.Please refresh the page and try again later.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return ($e->getMessage());
        } catch (\Stripe\Exception\AuthenticationException $e) {
            return ($e->getMessage());
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            return ('You are not connected to the Internet. Please refresh the page and try again later.');
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return ($e->getMessage());
        } catch (Exception $e) {
            return ($e->getMessage());
        }
    }

    public static function PayChangePlan($user, $amount, $currency, $token, $application_fee_amount, $plan, $subscription, $connect_account)
    {
        try {
            if ($stripe = self::StripeClient()) {
                if ($client = self::Is($user)) {
                    $stripe->charges->create([
                        'amount' => $amount,
                        'currency' => $currency,
                        'source' => $token,
                        'application_fee_amount' => $application_fee_amount,
                        'description' => 'Client ' . $client->name . ' & ' . $client->email . ' Changed Plan',
                    ], [$connect_account]);
                    self::ChangePlan($client->id, $plan, $subscription);
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
