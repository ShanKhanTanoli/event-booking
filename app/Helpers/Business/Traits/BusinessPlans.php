<?php

namespace App\Helpers\Business\Traits;

use App\Models\Plan;

trait BusinessPlans
{

    /*Begin::Plans*/
    public static function Plans($business)
    {
        return Plan::where('user_id', $business);
    }

    public static function PlansLatestPaginate($business, $quantity)
    {
        return self::Plans($business)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountPlans($business)
    {
        return self::Plans($business)->count();
    }

    public static function FindPlan($business, $plan)
    {
        return self::Plans($business)->find($plan);
    }

    public static function FindPlanByPlanId($business, $plan_id)
    {
        return self::Plans($business)->where('plan_id', $plan_id)->first();
    }

    public static function FindPlanBySlug($business, $slug)
    {
        return self::Plans($business)->where('slug', $slug)->first();
    }

    /*End::Plans*/
}
