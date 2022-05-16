<?php

namespace App\Helpers\Client;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Client\Traits\ClientMails;
use App\Helpers\Client\Traits\ClientSettings;
use App\Helpers\Client\Traits\ClientSubscriptions;

class Client
{
    use ClientSubscriptions, ClientMails, ClientSettings;

    public static function Is()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 3 && $user->role == "client") {
                return $user;
            }
            return false;
        }
        return false;
    }

    public static function all()
    {
        return User::where('role_id', '3')
            ->where('role', 'client');
    }

    public static function LatestPaginate($quantity)
    {
        return self::all()->latest()
            ->paginate($quantity);
    }

    public static function count()
    {
        return self::all()->count();
    }
}
