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
}
