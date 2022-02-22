<?php

namespace App\Helpers\Admin\Traits;

use App\Models\Reservation;

trait Reservations
{
    public static function AllReservations()
    {
        return Reservation::withTrashed();
    }

    public static function FindReservation($id)
    {
        if(!is_null($reservation = self::AllReservations()->find($id))){
            return $reservation;
        }else return false;
    }

    public static function FindReservationBySlug($slug)
    {
        if(!is_null($reservation = self::AllReservations()->where('slug',$slug)->first())){
            return $reservation;
        }else return false;
    }

    public static function CountAllReservations()
    {
        return self::AllReservations()->count();
    }

    public static function ActiveReservations()
    {
        return self::AllReservations()->where('status', 'active');
    }

    public static function CountActiveReservations()
    {
        return self::ActiveReservations()->count();
    }
    
    public static function ArchivedReservations()
    {
        return self::AllReservations()->where('status', 'archived');
    }

    public static function CountArchivedReservations()
    {
        return self::ArchivedReservations()->count();
    }

    public static function BannedReservations()
    {
        return self::AllReservations()->where('status', 'banned');
    }

    public static function CountBannedReservations()
    {
        return self::BannedReservations()->count();
    }

}
