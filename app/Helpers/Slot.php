<?php

namespace App\Helpers;

use DateTime;
use Exception;
use App\Models\Reservation;
use App\Models\ClientBooking;
use App\Models\Slot as ModelSlot;

class Slot
{
    public static function Info($slot)
    {
        return ModelSlot::find($slot);
    }

    public static function IsBooked($slot)
    {
        $booked = ClientBooking::where('slot_id', $slot)
        ->latest()->first();
        if(!is_null($booked)){
            return $booked;
        }else return false;
    }
    
    public static function Bookings($slot)
    {
        return ClientBooking::where('slot_id', $slot);
    }

    public static function CountBookings($slot)
    {
        return self::Bookings($slot)->count();
    }

    public static function ReservationIsActive($reservation)
    {
        if (!is_null($find = Reservation::find($reservation))) {
            if ($find->status == 'active') {
                return true;
            } else return false;
        } else return false;
    }

    public static function CanBeBooked($slot)
    {
        if (!is_null($slot = ModelSlot::find($slot))) {
            if (self::ReservationIsActive($slot->reservation_id)) {
                $starting_date = $slot->starting_date;
                $can_book_before = $slot->can_book_before;
                //If Starting Date is Greater than Or Equal to Current Date
                if ($starting_date >= date('Y-m-d')) {
                    $starting_date =  strtotime($starting_date);
                    $current_date =   strtotime(date("Y-m-d"));
                    $totalSecondsDiff = abs($starting_date - $current_date);
                    $totalMinutesDiff = $totalSecondsDiff / 60;
                    if (intval($can_book_before ) <= $totalMinutesDiff) {
                        return true;
                    } else return false;
                } else return false;
            } else return false;
        } else return false;
    }

    public static function CanBeCanceled($slot)
    {
        if (!is_null($slot = ModelSlot::find($slot))) {
            if (self::ReservationIsActive($slot->reservation_id)) {
                $starting_date = $slot->starting_date;
                $can_cancel_before = $slot->can_cancel_before;
                //If Starting Date is Greater than Or Equal to Current Date
                if ($starting_date >= date('Y-m-d')) {
                    $starting_date =  strtotime($starting_date);
                    $current_date =   strtotime(date("Y-m-d"));
                    $totalSecondsDiff = abs($starting_date - $current_date);
                    $totalMinutesDiff = $totalSecondsDiff / 60;
                    if (intval($can_cancel_before) <= $totalMinutesDiff) {
                        return true;
                    } else return false;
                } else return false;
            } else return false;
        } else return false;
    }
}