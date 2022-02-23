<?php

namespace App\Helpers\Business\Traits;

use Exception;
use Rinvex\Subscriptions\Models\PlanFeature;

trait BusinessPlans
{

    public static function Plans($user)
    {
        if ($business = self::Is($user)) {
            if ($business->plans->count() > 0) {
                return $business->plans;
            } else return false;
        } else return false;
    }

    public static function CountPlans($user)
    {
        if ($plans = self::Plans($user)) {
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
                try {
                    $find = $plans->find($plan);
                    $find->update($data);
                } catch (Exception $e) {
                    return session()->flash('error', $e->getMessage());
                }
                return session()->flash('success', $msg);
            } else return session()->flash('error', 'something went wrong');
        } else return session()->flash('error', 'something went wrong');
    }

    public static function DeletePlan($user, $plan)
    {
        if ($plans =  self::Plans($user)) {
            if (!is_null($plans->find($plan))) {
                $find = $plans->find($plan);
                $find->delete();
                return session()->flash('success', 'Deleted Successfully');
            } else return session()->flash('error', 'something went wrong');
        } else return session()->flash('error', 'something went wrong');
    }
}