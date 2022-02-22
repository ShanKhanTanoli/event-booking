<?php

namespace App\Helpers\Admin\Traits;

use Rinvex\Subscriptions\Models\PlanFeature;

trait PricingPlans
{
    public static function Plans($user)
    {
        if ($admin = self::Is($user)) {
                return $admin->plans;
        } else return false;
    }

    public static function CountPlans($user)
    {
        if ($plans = self::Plans($user)) {
            return $plans->count();
        } else return 0;
    }

    public static function ActivePlans($user)
    {
        if ($admin = self::Is($user)) {
            if ($admin->plans->count() > 0) {
                return $admin->plans->where('is_active', true);
            } else return false;
        } else return false;
    }

    public static function CountActivePlans($user)
    {
        if ($plans = self::ActivePlans($user)) {
            return $plans->count();
        } else return 0;
    }

    public static function ArchivedPlans($user)
    {
        if ($admin = self::Is($user)) {
            if ($admin->plans->count() > 0) {
                return $admin->plans->where('is_active', false);
            } else return false;
        } else return false;
    }

    public static function CountArchivedPlans($user)
    {
        if ($plans = self::ArchivedPlans($user)) {
            return $plans->count();
        } else return 0;
    }

    public static function PlanFindByPriceId($user, $price_id)
    {
        if ($plans =  self::Plans($user)) {
            if (!is_null($plans->where('price_id', $price_id)->first())) {
                return $plans->where('price_id', $price_id)->first();
            } else return session()->flash('error', 'something went wrong');
        } else return session()->flash('error', 'something went wrong');
    }


    public static function PlanFeatureById($user, $plan_id)
    {
        if ($plans =  self::Plans($user)) {
            if ($feature = PlanFeature::where('plan_id', $plan_id)->first()) {
                return $feature;
            } else return false;
        } else return false;
    }

    public static function UpdatePlan($user, $plan, $data, $msg)
    {
        if ($plans =  self::Plans($user)) {
            if (!is_null($plans->find($plan))) {
                $find = $plans->find($plan);
                $find->update($data);
                return session()->flash('success', $msg);
            } else return session()->flash('error', 'something went wrong');
        } else return session()->flash('error', 'something went wrong');
    }
}
