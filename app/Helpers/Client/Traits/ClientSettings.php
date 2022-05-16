<?php

namespace App\Helpers\Client\Traits;

use App\Models\ClientSetting;
use App\Models\Language;

trait ClientSettings
{

    /*Begin::Settings*/
    public static function Settings($business)
    {
        return ClientSetting::where('user_id', $business)
            ->first();
    }

    public static function Language($business)
    {
        if ($settings = self::Settings($business)) {
            if ($language = Language::find($settings->language_id)) {
                return $language->name;
            } else return "en";
        } else return "en";
    }

    /*End::Settings*/
}
