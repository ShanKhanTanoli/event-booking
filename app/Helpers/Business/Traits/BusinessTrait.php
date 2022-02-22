<?php

namespace App\Helpers\Business\Traits;

use App\Models\User;
use App\Helpers\Business\Traits\BusinessStripe;
use App\Helpers\Business\Traits\BusinessClients;
use App\Helpers\Business\Traits\BusinessSettings;
use App\Helpers\Business\Traits\BusinessAbilities;
use App\Helpers\Business\Traits\BusinessReservations;
use App\Helpers\Business\Traits\BusinessSubscriptions;

trait BusinessTrait
{
    use BusinessReservations,
        BusinessClients,
        BusinessAbilities,
        BusinessSettings,
        BusinessStripe,
        BusinessSubscriptions;

    public static function Is($user)
    {
        if (!is_null($business = User::find($user))) {
            if ($business->role == 'business' && $business->role_id == 2) {
                return $business;
            } else return false;
        } else return false;
    }

    public static function findByUsername($user_name)
    {
        if (!is_null($business = User::where('user_name', $user_name)->first())) {
            if ($business->role == 'business' && $business->role_id == 2) {
                return $business;
            } else return false;
        } else return false;
    }
    public static function findByBusinessUserName($user_name)
    {
        if (!is_null($business = User::where('business_user_name', $user_name)->first())) {
            if ($business->role == 'business' && $business->role_id == 2) {
                return $business;
            } else return false;
        } else return false;
    }
}
