<?php

namespace App\Helpers\Client\Traits;

use App\Models\User;
use App\Models\Reservation;
use App\Models\ClientReservation;
use App\Helpers\Client\Traits\ClientBooking;
use App\Helpers\Client\Traits\ClientSubscriptions;

trait ClientTrait
{
    use ClientSubscriptions, ClientBooking;

    public static function Is($user)
    {
        if (!is_null($client = User::find($user))) {
            if ($client->role == 'client' && $client->role_id == 3) {
                return $client;
            } else return false;
        } else return false;
    }

    public static function IsCustomer($user)
    {
        if ($client = self::Is($user)) {
            if (!is_null($client->customer_id)) {
                return $client->customer_id;
            } else return false;
        } else return false;
    }

    public static function JoinedAnyBusiness($user)
    {
        if ($client = self::Is($user)) {
            if (!is_null($client->created_by)) {
                return $client->created_by;
            } else return false;
        } else return false;
    }

    public static function JoinedBusiness($user)
    {
        if ($business = self::JoinedAnyBusiness($user)) {
            if (!is_null($find = User::find($business))) {
                return $find;
            } else return false;
        } else return false;
    }

    public static function JoinedBusinessReservations($user)
    {
        if ($business = self::JoinedAnyBusiness($user)) {
            if (!is_null($find = User::find($business))) {
                return $find->reservations;
            } else return false;
        } else return false;
    }

    public static function HasThisReservation($user, $reservation)
    {
        if ($booking = self::Bookings($user)) {
            if (!is_null($booking = $booking->where('reservation_id', $reservation)->first())) {
                return $booking;
            } else return false;
        } else return false;
    }

    public static function BookedReservations($user)
    {
        if ($reservations = self::Bookings($user)) {
            return Reservation::find($reservations->where('status', 'active')
                ->unique()->pluck('reservation_id')->toArray());
        } else return false;
    }
    public static function ReservationIsActive($user, $reservation)
    {
        if ($booking = self::HasThisReservation($user, $reservation)) {
            if ($booking->status == 'active') {
                return $booking;
            } else return false;
        } else return false;
    }
}
