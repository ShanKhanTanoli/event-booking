<?php

namespace App\Helpers\Admin\Traits;

use App\Models\Plan;

trait AdminPlans
{

    /*Begin::Plans*/
    public static function Plans($admin)
    {
        return Plan::where('user_id', $admin);
    }

    public static function PlansLatestPaginate($admin, $quantity)
    {
        return self::Plans($admin)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountPlans($admin)
    {
        return self::Plans($admin)->count();
    }

    public static function FindPlan($admin, $plan)
    {
        return self::Plans($admin)->find($plan);
    }

    public static function FindPlanByPlanId($admin, $plan_id)
    {
        return self::Plans($admin)->where('plan_id', $plan_id)->first();
    }

    public static function FindPlanBySlug($admin, $slug)
    {
        return self::Plans($admin)->where('slug', $slug)->first();
    }

    /*End::Plans*/
}
