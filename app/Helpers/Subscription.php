<?php

namespace App\Helpers;

use Exception;


class Subscription
{
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
}