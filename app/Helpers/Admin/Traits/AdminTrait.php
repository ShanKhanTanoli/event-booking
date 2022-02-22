<?php

namespace App\Helpers\Admin\Traits;

use App\Models\User;
use App\Models\Setting;
use App\Helpers\Admin\Traits\PricingPlans;
use App\Helpers\Admin\Traits\Reservations;
use App\Helpers\Admin\Traits\BusinessTrait;

trait AdminTrait
{

    use ClientsTrait, BusinessTrait, Reservations, PricingPlans;

    public static function Is($user)
    {
        if (!is_null($admin = User::withTrashed()->find($user))) {
            if ($admin->role == 'admin' && $admin->role_id == 1) {
                return $admin;
            } else return false;
        } else return false;
    }

    public static function Settings()
    {
        if (!is_null($settings = Setting::first())) {
            return $settings;
        } else return false;
    }

    public static function Get()
    {
        $admin = User::withTrashed()->where('role_id',1)
        ->where('role','admin')->first();
        if(!is_null($admin)){
            return $admin;
        }else return false;
    }

}
