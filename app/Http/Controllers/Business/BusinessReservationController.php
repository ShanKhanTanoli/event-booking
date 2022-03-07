<?php

namespace App\Http\Controllers\Business;


use App\Helpers\Business\Business;
use App\Helpers\Slot;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessReservationController extends Controller
{
    protected $path = 'dashboard.business.';

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'business']);
    }

    public function Reservations()
    {
        return view($this->path . 'reservations.index');
    }

    public function EditReservation($slug)
    {
        if (Business::Is(Auth::user()->id)) {
            if ($reservation = Business::ReservationBySlug(Auth::user()->id, $slug)) {
                return view($this->path . 'reservations.edit.index')
                ->with(['reservation' => $reservation]);
            } else {
                session()->flash('error', 'Reservation not found');
                return redirect(route('BusinessReservations'));
            }
        } else return session()->flash('error', 'Something went wrong');
    }

    public function AddReservations()
    {
        return view($this->path . 'reservations.add.index');
    }

    public function ViewReservationSlots($slug)
    {
        if (Business::Is(Auth::user()->id)) {
            if ($reservation = Business::ReservationBySlug(Auth::user()->id, $slug)) {
                return view($this->path . 'reservations.slots.index')
                ->with(['reservation' => $reservation]);
            } else {
                session()->flash('error', 'Reservation not found');
                return redirect(route('BusinessReservations'));
            }
        } else return session()->flash('error', 'Something went wrong');
    }

    public function ViewSlotBookings($slug)
    {
        if (Business::Is(Auth::user()->id)) {
            if(!is_null($slot = Slot::FindBySlug($slug))){
                if (Business::Reservation(Auth::user()->id, $slot->reservation_id)) {
                    return view($this->path . 'reservations.slots.bookings.index')
                    ->with(['slot' => $slot]);
                } else {
                    session()->flash('error', 'Something went wrong');
                    return redirect(route('BusinessReservations'));
                }
            }else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function SelectReservationSlotsType($slug)
    {
        if (Business::Is(Auth::user()->id)) {
            if ($reservation = Business::ReservationBySlug(Auth::user()->id, $slug)) {
                return view($this->path . 'reservations.slots.type')
                ->with(['reservation' => $reservation]);
            } else {
                session()->flash('error', 'Reservation not found');
                return redirect(route('BusinessReservations'));
            }
        } else return session()->flash('error', 'Something went wrong');
    }

    public function ReservationAddSpecificDaySlots($slug)
    {
        if (Business::Is(Auth::user()->id)) {
            if ($reservation = Business::ReservationBySlug(Auth::user()->id, $slug)) {
                return view($this->path . 'reservations.slots.add.specificday.index')
                ->with(['reservation' => $reservation]);
            } else {
                session()->flash('error', 'Reservation not found');
                return redirect(route('BusinessReservations'));
            }
        } else return session()->flash('error', 'Something went wrong');
    }

    public function ReservationAddWeeklySlots($slug)
    {
        if (Business::Is(Auth::user()->id)) {
            if ($reservation = Business::ReservationBySlug(Auth::user()->id, $slug)) {
                return view($this->path . 'reservations.slots.add.weekly.index')
                ->with(['reservation' => $reservation]);
            } else {
                session()->flash('error', 'Reservation not found');
                return redirect(route('BusinessReservations'));
            }
        } else return session()->flash('error', 'Something went wrong');
    }

    public function ReservationAddDailySlots($slug)
    {
        if (Business::Is(Auth::user()->id)) {
            if ($reservation = Business::ReservationBySlug(Auth::user()->id, $slug)) {
                return view($this->path . 'reservations.slots.add.daily.index')
                ->with(['reservation' => $reservation]);
            } else {
                session()->flash('error', 'Reservation not found');
                return redirect(route('BusinessReservations'));
            }
        } else return session()->flash('error', 'Something went wrong');
    }
}
