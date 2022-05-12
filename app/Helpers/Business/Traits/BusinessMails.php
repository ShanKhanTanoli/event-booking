<?php

namespace App\Helpers\Business\Traits;

use App\Models\Mail;

trait BusinessMails
{

    /*Begin::Mails*/
    public static function Mails($business)
    {
        return Mail::where('user_id', $business);
    }

    public static function MailsLatestPaginate($business, $quantity)
    {
        return self::Mails($business)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountMails($business)
    {
        return self::Mails($business)->count();
    }

    public static function FindMail($business, $mail)
    {
        return self::Mails($business)->find($mail);
    }

    public static function FindMailBySlug($business, $slug)
    {
        return self::Mails($business)->where('slug', $slug)->first();
    }

    /*End::Mails*/
}
