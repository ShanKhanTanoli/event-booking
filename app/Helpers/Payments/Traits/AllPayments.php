<?php

namespace App\Helpers\Payments\Traits;

trait AllPayments
{
    public static function All()
    {
        // return ClientVoucher::latest();
        return null;
    }

    public static function LatestPaginate($quantity)
    {
        // return self::All()
        //     ->paginate($quantity);
        return [];
    }

    public static function Count()
    {
        //return self::All()->count();
        return 0;
    }
}
