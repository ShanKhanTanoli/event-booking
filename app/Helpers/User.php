<?php

namespace App\Helpers;

use App\Models\Country;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;

class User
{
    public static function IsAdmin()
    {
        $role_id = Auth::user()->role_id == 1;
        $role = Auth::user()->role == 'admin';
        return $role_id && $role ? true : false;
    }

    public static function IsBusiness()
    {
        $role_id = Auth::user()->role_id == 2;
        $role = Auth::user()->role == 'business';
        return $role_id && $role ? true : false;
    }

    public static function IsClient()
    {
        $role_id = Auth::user()->role_id == 3;
        $role = Auth::user()->role == 'client';
        return $role_id && $role ? true : false;
    }

    public static function RedirectToDashboard()
    {
        if (Auth::user()) {
            if (self::IsAdmin()) {
                return route('AdminDashboard');
            } elseif (self::IsBusiness()) {
                return route('BusinessDashboard');
            } elseif (self::IsClient()) {
                return route('ClientDashboard');
            } else {
                return url('/');
            }
        } else return route('login');
    }

    public static function hasConnectAccount($user)
    {
        if (!is_null($find = ModelsUser::withTrashed()->find($user))) {
            if (!is_null($find->stripe_account_id)) {
                return $find;
            } else return false;
        } else return false;
    }

    public static function PayoutsEnabled($user)
    {
        if ($account = self::hasConnectAccount($user)) {
            if ($account = Stripe::RetrieveAccount($user)) {
                if ($account->payouts_enabled) {
                    return true;
                } else return false;
            }
            return false;
        }
        return false;
    }
}
