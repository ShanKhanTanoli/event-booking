<?php

namespace App\Helpers\Business;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Business\Traits\BusinessMails;
use App\Helpers\Business\Traits\BusinessClients;
use App\Helpers\Business\Traits\BusinessSettings;
use App\Helpers\Business\Traits\BusinessStripePrices;
use App\Helpers\Business\Traits\BusinessStripeProducts;
use App\Helpers\Business\Traits\BusinessSubscriptions;

class Business
{
    use BusinessClients,
        BusinessMails,
        BusinessStripeProducts,
        BusinessStripePrices,
        BusinessSubscriptions,
        BusinessSettings;

    public static function Is()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 2 && $user->role == "business") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function Find($business)
    {
        if ($user = User::find($business)) {
            if ($user->role_id == 2 && $user->role == "business") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function FindBySlug($slug)
    {
        if ($user = User::where('slug', $slug)->first()) {
            if ($user->role_id == 2 && $user->role == "business") {
                return $user;
            } else return false;
        } else return false;
    }

    public static function FindByUserName($user_name)
    {
        if ($user = User::where('user_name', $user_name)->first()) {
            if ($user->role_id == 2 && $user->role == "business") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function Latest()
    {
        return User::where('role_id', '2')
            ->where('role', 'business')
            ->latest();
    }

    public static function LatestPaginate($quantity)
    {
        return self::Latest()
            ->paginate($quantity);
    }

    public static function count()
    {
        return self::Latest()->count();
    }
}
