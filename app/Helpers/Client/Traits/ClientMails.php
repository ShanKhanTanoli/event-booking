<?php

namespace App\Helpers\Client\Traits;

use App\Models\Mail;

trait ClientMails
{

    /*Begin::Mails*/
    public static function Mails($client)
    {
        return Mail::where('user_id', $client);
    }

    public static function MailsLatestPaginate($client, $quantity)
    {
        return self::Mails($client)
            ->latest()
            ->paginate($quantity);
    }

    public static function CountMails($client)
    {
        return self::Mails($client)->count();
    }

    public static function FindMail($client, $mail)
    {
        return self::Mails($client)->find($mail);
    }

    public static function FindMailBySlug($client, $slug)
    {
        return self::Mails($client)->where('slug', $slug)->first();
    }

    /*End::Mails*/
}
