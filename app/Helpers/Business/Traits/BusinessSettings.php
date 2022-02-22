<?php

namespace App\Helpers\Business\Traits;


trait BusinessSettings
{
    public static function Settings($user)
    {
        if($business = self::Is($user)){
            if(!is_null($business->settings)){
                return $business->settings;
            }else return false;
        }else return false;
    }
}