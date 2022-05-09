<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Redirect
{
    public static function ToDashboard()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 1 && $user->role == "admin") {
                return route('AdminDashboard', App::getLocale());
            } elseif ($user->role_id == 2 && $user->role == "business") {
                return route('BusinessDashboard', App::getLocale());
            } elseif ($user->role_id == 3 && $user->role == "client") {
                return route('ClientDashboard', App::getLocale());
            } else return route('login', App::getLocale());
        } else return route('login', App::getLocale());
    }
}
