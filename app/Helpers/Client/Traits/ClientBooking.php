<?php

namespace App\Helpers\Client\Traits;

use App\Models\Slot;
use App\Helpers\Booking;
use App\Helpers\Slot as SlotHelper;
use App\Models\ClientBooking as BookingModel;

trait ClientBooking
{
    public static function BookingLimit($user)
    {
        if ($subscription = self::HasActiveSubscription($user)) {
            if (self::ReservationsLimit($user) > self::BookingsWithSubscription($user, $subscription->id)->count()) {
                return true;
            } else return session()->flash('error', "Sorry your booking limit has been exceeded.");
        } else return session()->flash('error', "Sorry you don't have an active subscription.");
    }

    public static function AllBookings($user)
    {
        return BookingModel::where('user_id', $user);
    }

    public static function BookedSlots($ids)
    {
        return Slot::find($ids);
    }

    public static function BookingStatus($slot)
    {
        dd(Slot::IsBooked($slot));
    }

    public static function CountBookings($user)
    {
        return BookingModel::where('user_id', $user)->count();
    }

    public static function BookingsWithSubscription($user, $subscription)
    {
        return BookingModel::where('user_id', $user)
            ->where('subscription_id', $subscription);
    }

    public static function ActiveBookings($user)
    {
        return BookingModel::where('user_id', $user);
    }

    public static function CanceledBookings($user)
    {
        return BookingModel::onlyTrashed()->where('user_id', $user);
    }

    public static function BookReservation($user, $slot)
    {
        if ($subscription = self::HasActiveSubscription($user)) {
            if (!is_null($find_slot = SlotHelper::Info($slot))) {
                if (self::BookingLimit($user)) {
                    return Booking::new($user, $slot, $subscription->id);
                } else return session()->flash('error', "Sorry your booking limit has been exceeded.");
            } else return session()->flash('error', "Something went wrong while booking.");
        } else return session()->flash('error', "Sorry you don't have an active subscription.");
    }

    public static function CancelBooking($user, $slot)
    {
        if (!is_null($find_slot = SlotHelper::Info($slot))) {
            return Booking::cancel($user, $slot);
        } else return session()->flash('error', "Something went wrong while booking.");
    }
}
