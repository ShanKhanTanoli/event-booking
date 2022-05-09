<?php

namespace App\Helpers\Business\Traits;

use App\Models\User;

trait BusinessClients
{

    /*Begin::Clients*/
    public static function Clients($business)
    {
        return User::where('parent_business_id', $business);
    }

    public static function ClientsLatestPaginate($business, $quantity)
    {
        return self::Clients($business)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountClients($business)
    {
        return self::Clients($business)->count();
    }

    public static function FindClient($business, $client)
    {
        return self::Clients($business)->find($client);
    }

    public static function FindClientBySlug($business, $slug)
    {
        return self::Clients($business)->where('slug', $slug)->first();
    }

    /*End::Clients*/
}
