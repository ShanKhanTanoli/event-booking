<?php

namespace App\Helpers\Business\Traits;

use App\Models\Reservation;

trait BusinessReservations
{

    public static function Reservations($user)
    {
        if ($self = self::Is($user)) {
            return $self->reservations;
        } else return false;
    }

    public static function CountReservations($user)
    {
        return self::Reservations($user) ? self::Reservations($user)->count() :  0;
    }

    public static function ActiveReservations($user)
    {
        return self::Reservations($user) ? self::Reservations($user)->where('status', 'active') : [];
    }

    public static function CountActiveReservations($user)
    {
        return self::ActiveReservations($user) ? self::ActiveReservations($user)->count() : 0;
    }

    public static function ArchivedReservations($user)
    {
        return self::Reservations($user) ? self::Reservations($user)->where('status', 'archived') : [];
    }

    public static function CountArchivedReservations($user)
    {
        return self::ArchivedReservations($user) ? self::ArchivedReservations($user)->count() : 0;
    }

    public static function BannedReservations($user)
    {
        return self::Reservations($user)
            ? self::Reservations($user)->where('status', 'banned') : [];
    }

    public static function CountBannedReservations($user)
    {
        return self::BannedReservations($user) ? self::BannedReservations($user)->count() : 0;
    }

    public static function Reservation($user, $reservation)
    {
        if ($reservations = self::Reservations($user)) {
            if (!is_null($reservations->find($reservation))) {
                return $reservations->find($reservation);
            } else return false;
        } else return false;
    }

    public static function ReservationBySlug($user, $slug)
    {
        if ($reservations = self::Reservations($user)) {
            if (!is_null($reservations->where('slug', $slug)->first())) {
                return $reservations->where('slug', $slug)->first();
            } else return false;
        } else return false;
    }

    public static function Slots($reservation,$take = 3)
    {
        return Reservation::find($reservation)->slots->take($take);
    }

    public static function CountSlots($reservation)
    {
        return Reservation::find($reservation)->slots->count();
    }

    public static function ReservationIsBanned($user, $reservation)
    {
        if ($reservations = self::Reservations($user)) {
            if (!is_null($reservations->find($reservation))) {
                if ($reservations->find($reservation)->status == 'banned') {
                    return $reservations->find($reservation);
                } else return false;
            } else return false;
        } else return false;
    }

    public static function ReservationWithSubscription($user, $subscription)
    {
        if ($reservations = self::Reservations($user)) {
            return $reservations->where('subscription_id', $subscription);
        } else return false;
    }

    public static function CountReservationWithSubscription($user, $subscription)
    {
        if ($reservations = self::Reservations($user)) {
            return $reservations->where('subscription_id', $subscription)->count();
        } else return 0;
    }
}
