<?php

namespace App\Helpers\Business\Traits;

use App\Models\BusinessSetting;
use App\Models\Currency;
use App\Models\Language;

trait BusinessSettings
{

    /*Begin::Settings*/
    public static function Settings($business)
    {
        return BusinessSetting::where('user_id', $business)
            ->first();
    }

    public static function Currency($business)
    {
        if ($settings = self::Settings($business)) {
            if ($currency = Currency::find($settings->currency_id)) {
                return $currency->name;
            } else return "usd";
        } else return "usd";
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
