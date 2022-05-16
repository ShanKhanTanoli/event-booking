<?php

namespace App\Helpers\Client\Traits;


trait ClientSubscriptions
{

    /*Begin::Subscriptions*/
    public static function Subscriptions($client)
    {
        return $client->subscriptions();
    }

    public static function SubscriptionsLatestPaginate($client, $quantity)
    {
        return self::Subscriptions($client)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountSubscriptions($client)
    {
        return self::Subscriptions($client)->count();
    }

    public static function FindSubscription($client, $subscription)
    {
        return self::Subscriptions($client)
            ->where('name', $subscription)
            ->first();
    }
    /*End::Subscriptions*/
}
