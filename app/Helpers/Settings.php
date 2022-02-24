<?php

namespace App\Helpers;

use App\Models\Setting as ModelsSettings;

class Settings
{

    public static function Info()
    {
        if(!is_null($settings = ModelsSettings::first())){
            return $settings;
        }return false;
    }

    public static function CommissionPercent()
    {
        if(($settings = self::Info())){
            return $settings->commission_percentage;
        }return 0;
    }

    public static function Currency()
    {
        if(($settings = self::Info())){
            return $settings->currency;
        }return 'usd';
    }
}
