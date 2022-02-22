<?php

namespace App\Helpers\Business\Traits;

use Exception;
use Rinvex\Subscriptions\Models\Plan;

trait BusinessSubscriptions
{

    public static function Subscriptions($user)
    {
        if ($business = self::Is($user)) {
            try {
                return app('rinvex.subscriptions.plan_subscription')
                    ->ofSubscriber($business);
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else return session()->flash('error', 'Something went wrong');
    }

    public static function CountSubscriptions($user)
    {
        if ($business = self::Is($user)) {
            try {
                return app('rinvex.subscriptions.plan_subscription')
                    ->ofSubscriber($business)->count();
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else return session()->flash('error', 'Something went wrong');
    }

    public static function CreateSubscription($user,$stripe_charge_id,$name, $plan)
    {
        if ($business = self::Is($user)) {
            if (!is_null($plan = app('rinvex.subscriptions.plan')->find($plan))) {
                try {
                    $business->newPlanSubscription($stripe_charge_id,$name, $plan,$business->reg_no);
                    return session()->flash('success', 'Subscribed Successfully');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public static function CancelSubscription($user, $invoice)
    {
        if ($business = self::Is($user)) {
                try {
                    if (!is_null($sub = $business->planSubscription($invoice))) {
                        $sub->cancel();
                        return session()->flash('success', 'Cancelled Successfully');
                    } else throw new Exception('Something went wrong');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
        } else return session()->flash('error', 'Something went wrong');
    }

    public static function ResumeSubscription($user, $invoice)
    {
        if ($business = self::Is($user)) {
                try {
                    if (!is_null($sub = $business->planSubscription($invoice))) {
                        $sub->resume();
                        return session()->flash('success', 'Resumed Successfully');
                    } else throw new Exception('Something went wrong');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
        } else return session()->flash('error', 'Something went wrong');
    }

    public static function RenewSubscription($user, $invoice)
    {
        if ($business = self::Is($user)) {
                try {
                    if (!is_null($sub = $business->planSubscription($invoice))) {
                        $sub->renew();
                        return session()->flash('success', 'Renewed Successfully');
                    } else throw new Exception('Something went wrong');
                    return session()->flash('success', 'Renewed Successfully');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
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

    public static function ChangePlan($user, $plan, $subscription)
    {
        if ($business = self::Is($user)) {
            if (!is_null($plan = app('rinvex.subscriptions.plan')->find($plan))) {
                try {
                    if (!is_null($sub = app('rinvex.subscriptions.plan_subscription')->find($subscription))) {
                        $sub->changePlan($plan);
                        return session()->flash('success', 'Plan Changed Successfully');
                    } else throw new Exception('Something went wrong');
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public static function HasActiveSubscription($user)
    {
        if ($business = self::Is($user)) {
            $model = app('rinvex.subscriptions.plan_subscription');
           if(!is_null($subs = $model->ActiveSubscriptionOfSubscriber($business)->first())){
            return $subs;
           }else return false;
        } else return false;
    }

    public static function ReservationsLimit($user)
    {
        if ($business = self::Is($user)) {
            $model = app('rinvex.subscriptions.plan_subscription');
           if(!is_null($subs = $model->ActiveSubscriptionOfSubscriber($business)->first())){
            if(!is_null($limit = Plan::find($subs->plan_id))){
                return $limit->reservations;
            }else return false;
           }else return false;
        } else return false;
    }
}
