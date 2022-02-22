<?php

namespace App\Helpers;

use Exception;
use App\Helpers\Slot;
use App\Models\ClientBooking;

class Booking
{
    public static function new($user, $slot, $subscription)
    {
        if (Slot::CanBeBooked($slot)) {
            try {
                ClientBooking::create([
                    'subscription_id' => $subscription,
                    'user_id' => $user,
                    'slot_id' => $slot,
                    'booked_at' => date('Y-m-d H:i:s'),
                ]);
                return session()->flash('success', "Booked Successfully");
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else return session()->flash('error', "Something went wrong");
    }

    public static function cancel($user, $slot)
    {
        if (Slot::CanBeCanceled($slot)) {
            $booking = ClientBooking::where('user_id', $user)
                ->where('slot_id', $slot)->latest()->first();
            if (!is_null($booking)) {
                if ($booking->delete()) {
                    return session()->flash('success', "Canceled Successfully");
                } else return session()->flash('error', "Something went wrong");
            } else return session()->flash('error', "Something went wrong");
        } else return session()->flash('error', "Can not book this slot.");
    }

    public static function is_booked($user, $slot)
    {
        $booking = ClientBooking::where('user_id', $user)
            ->where('slot_id', $slot)->latest()->first();
        if (is_null($booking)) {
            return true;
        } else return false;
    }

    public static function is_canceled($user, $slot)
    {
        $booking = ClientBooking::withTrashed()->where('user_id', $user)
            ->where('slot_id', $slot)->latest()->first();
        if (!is_null($booking->deleted_at)) {
            return true;
        } else return false;
    }
}
