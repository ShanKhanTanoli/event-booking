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

    public static function FindCardById($business, $id)
    {
        return self::Clients($business)
            ->find($id);
    }
    /*End::Clients*/
}
