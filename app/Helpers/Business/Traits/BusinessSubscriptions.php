<?php

namespace App\Helpers\Business\Traits;


trait BusinessSubscriptions
{

    /*Begin::Subscriptions*/
    public static function Subscriptions($business)
    {
        return $business->subscriptions();
    }

    public static function SubscriptionsLatestPaginate($business, $quantity)
    {
        return self::Subscriptions($business)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountSubscriptions($business)
    {
        return self::Subscriptions($business)->count();
    }

    public static function FinSubscription($business, $subscription)
    {
        return self::Subscriptions($business)
            ->where('stripe_price', $subscription)
            ->first();
    }
    /*End::Subscriptions*/
}
