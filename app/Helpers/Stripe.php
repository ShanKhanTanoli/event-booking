<?php

namespace App\Helpers;

use App\Helpers\Stripe\Traits\StripeCard;
use App\Helpers\Stripe\Traits\Authentication;
use App\Helpers\Stripe\Traits\ConnectAccount;


class Stripe
{
    use Authentication, StripeCard, ConnectAccount;
}
