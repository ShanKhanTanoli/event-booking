<?php

namespace App\Helpers\Business\Traits;

use App\Models\User;

trait BusinessClients
{

    public static function CheckClient($business, $user)
    {
        if ($self = self::Is($business)) {
            if (!is_null($client = User::find($user))) {
                if ($self->id == $client->created_by) {
                    return $client;
                }
                return false;
            } else return false;
        } else return false;
    }

    public static function CheckClientByRegNo($business, $reg_no)
    {
        if ($self = self::Is($business)) {
            if (!is_null($client = User::where('reg_no', $reg_no)->first())) {
                if ($self->id == $client->created_by) {
                    return $client;
                }
                return false;
            } else return false;
        } else return false;
    }

    public static function Clients($user)
    {
        if ($self = self::Is($user)) {
            return  User::where('created_by', $self->id);
        } else return false;
    }

    public static function CountClients($user)
    {
        if ($self = self::Is($user)) {
            return User::where('created_by', $self->id)->count();
        } else return 0;
    }

    public static function ClientIsVerified($business, $client)
    {
        if ($user = self::CheckClient($business, $client)) {
            if (!is_null($user->email_verified_at)) {
                return $user;
            } else return false;
        } else return false;
    }

    public static function VerifiedClients($user)
    {
        if ($self = self::Is($user)) {
            if ($clients = User::where('created_by', $self->id)->count() > 0) {
                return  User::where('created_by', $self->id)
                    ->where('email_verified_at', '!=', null);
            } else return false;
        } else return false;
    }

    public static function UnverifiedClients($user)
    {
        if ($self = self::Is($user)) {
            if ($clients = User::where('created_by', $self->id)->count() > 0) {
                return  User::where('created_by', $self->id)
                    ->where('email_verified_at', null);
            } else return false;
        } else return false;
    }

    public static function CountVerifiedClients($user)
    {
        if ($self = self::Is($user)) {
            if ($clients = User::where('created_by', $self->id)->count() > 0) {
                return  User::where('created_by', $self->id)
                    ->where('email_verified_at', '!=', null)->count();
            } else return 0;
        } else return 0;
    }

    public static function CountUnverifiedClients($user)
    {
        if ($self = self::Is($user)) {
            if ($clients = User::where('created_by', $self->id)->count() > 0) {
                return  User::where('created_by', $self->id)
                    ->where('email_verified_at', null)->count();
            } else return 0;
        } else return 0;
    }
}
