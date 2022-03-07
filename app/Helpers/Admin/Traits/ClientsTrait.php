<?php

namespace App\Helpers\Admin\Traits;

use App\Models\User;

trait ClientsTrait
{
    public static function CheckClient($user)
    {
        if (!is_null($client = User::withTrashed()->find($user))) {
            if ($client->role == 'client' && $client->role_id == 3) {
                return $client;
            } else return false;
        } else return false;
    }

    public static function ClientEmailStatus($user)
    {
        if ($client = self::CheckClient($user)) {
            if (!is_null($client->email_verified_at)) {
                return true;
            } else return false;
        } else return false;
    }

    public static function ClientIsVerified($user)
    {
        if(self::ClientEmailStatus($user)) {
            return true;
        }else return false;
    }

    public static function CheckClientByRegNo($reg_no)
    {
        if (!is_null($client = User::withTrashed()->where('reg_no',$reg_no)->first())) {
            if ($client->role == 'client' && $client->role_id == 3) {
                return $client;
            } else return false;
        } else return false;
    }



    public static function VerifiedClients()
    {
        return User::withTrashed()
            ->where('role', 'client')
            ->where('email_verified_at', '!=', null);
    }

    public static function CountVerifiedClients()
    {
        return self::VerifiedClients()->count();
    }

    public static function UnverifiedClients()
    {
        return User::withTrashed()
            ->where('role', 'client')
            ->where('email_verified_at', null);
    }

    public static function CountUnverifiedClients()
    {
        return self::UnverifiedClients()->count();
    }


    public static function AllClients()
    {
        return User::withTrashed()
        ->where('role', 'client');
    }

    public static function CountAllClients()
    {
        return self::AllClients()->count();
    }

    public static function ActiveClients()
    {
        return User::where('role', 'client');
    }

    public static function CountActiveClients()
    {
        return self::ActiveClients()->count();
    }

    public static function BannedClients()
    {
        return User::onlyTrashed()
            ->where('role', 'client');
    }

    public static function CountBannedClients()
    {
        return self::BannedClients()->count();
    }
}
