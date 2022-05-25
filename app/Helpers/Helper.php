<?php

namespace App\Helpers;

use DateTime;

class Helper
{

    /*Begin::Duration ago*/
    public static function TimeAgo($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
    /*End::Duration ago*/


    /*Begin::Count Slot Duration*/
    public static function CountSlotDuration($starting_date, $ending_date)
    {
        $datediff = strtotime($ending_date) - strtotime($starting_date);
        return round($datediff / (60 * 60 * 24));
    }
    /*End::Count Slot Duration*/
}
