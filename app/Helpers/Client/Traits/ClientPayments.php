<?php

namespace App\Helpers\Client\Traits;
trait ClientPayments
{
    public static function Payments($client)
    {
        return [];
        // $vouchers = ClientVoucher::where('user_id', $client);
        // return $vouchers;
    }

    public static function LatestPaymentsPaginate($client, $quantity)
    {
        // return self::Payments($client)->latest()->paginate($quantity);
        return [];
    }

    public static function PaymentsCount($client)
    {
        // return self::Payments($client)->count();
        return 0;
    }
}
