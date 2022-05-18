<?php

namespace App\Helpers\Admin;

use DateTime;
use App\Models\User;
use App\Models\Setting;
use App\Helpers\Currency\Currency;
use App\Helpers\Language\Language;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Admin\Traits\AdminPlans;

class Admin
{
    use AdminPlans;

    public static function Is()
    {
        if ($user = Auth::user()) {
            if ($user->role_id == 1 && $user->role == "admin") {
                return $user;
            }
            return false;
        }
        return false;
    }

    //Admin ID
    public static function ID()
    {
        if ($user = User::where('role_id', 1)->where('role', 'admin')->first()) {
            if ($user->role_id == 1 && $user->role == "admin") {
                return $user;
            }
            return false;
        }
        return false;
    }

    /*Begin::Language*/
    public static function Language()
    {
        if ($settings = Setting::first()) {
            if ($settings->language_id) {
                if ($language = Language::Find($settings->language_id)) {
                    if ($language->name) {
                        return $language->name;
                    } else return "en";
                } else return "en";
            } else return "en";
        } else return "en";
    }
    /*End::Language*/

    /*Begin::Currency*/
    public static function Currency()
    {
        if ($settings = Setting::first()) {
            if ($settings->currency_id) {
                if ($currency = Currency::Find($settings->currency_id)) {
                    if ($currency->name) {
                        return $currency->name;
                    } else return "usd";
                } else return "usd";
            } else return "usd";
        } else return "usd";
    }
    /*End::Currency*/

    /*Begin::Settings*/
    public static function Settings()
    {
        return Setting::first();
    }
    /*End::Settings*/

}
