<?php

namespace App\Helpers\Stripe\Traits;

use App\Models\PaymentGateway;

trait Authentication
{
    public static function PublicKey()
    {
        if (!is_null($stripe = PaymentGateway::first())) {
            return $stripe->public_key;
        } else return false;
    }

    public static function SecretKey()
    {
        if (!is_null($stripe = PaymentGateway::first())) {
            return $stripe->secret_key;
        } else return false;
    }

    public static function Mode()
    {
        if (!is_null($stripe = PaymentGateway::first())) {
            return $stripe->payment_mode;
        } else return false;
    }

    public static function Client()
    {
        if ($sk = self::SecretKey()) {
            return $stripe = new  \Stripe\StripeClient($sk);
        } else return false;
    }
}
