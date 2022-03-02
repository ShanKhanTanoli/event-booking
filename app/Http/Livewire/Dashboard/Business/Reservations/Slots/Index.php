<?php

namespace App\Http\Livewire\Dashboard\Business\Reservations\Slots;

use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $status;
    public $load = 8;

    public $reservation;

    public $delete_reservation;

    public function render()
    {
        $slots = Business::Slots($this->reservation->id, $this->load);
        return view('livewire.dashboard.business.reservations.slots.index')
        ->with([
            'reservation' => $this->reservation,
            'slots' => $slots,
        ]);
    }

    public function Activate($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $id)) {
                Business::Reservation(Auth::user()->id, $id)->update(['status' => 'active']);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('BusinessViewReservationSlots', $this->reservation->slug));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Archive($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $id)) {
                Business::Reservation(Auth::user()->id, $id)->update(['status' => 'archived']);
                session()->flash('success', 'Activated Successfully');
                return redirect(route('BusinessViewReservationSlots', $this->reservation->slug));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Edit($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if ($reservation = Business::Reservation(Auth::user()->id, $id)) {
                return redirect(route('BusinessEditReservation', $reservation->slug));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function RequestDelete($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $id)) {
                if ($reservation = Business::Reservation(Auth::user()->id, $id)) {
                    $this->delete_reservation = $reservation->id;
                    return $this->emit('RequestDelete', $reservation->id);
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Delete()
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $this->delete_reservation)) {
                if ($reservation = Business::Reservation(Auth::user()->id, $this->delete_reservation)) {
                    Business::Reservation(Auth::user()->id, $this->delete_reservation)
                        ->delete();
                    $this->emit('DeleteSuccess');
                    session()->flash('success', 'Deleted Successfully');
                    return redirect(route('BusinessReservations'));
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function DeleteSlot($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $this->reservation)) {
                if ($reservation = Business::Reservation(Auth::user()->id, $this->reservation)) {
                    if (!is_null($slot = $reservation->slots->find($id))) {
                        $slot->delete();
                        session()->flash('success', 'Deleted Successfully');
                        return redirect(route('BusinessViewReservationSlots', $this->reservation->slug));
                    } else return session()->flash('error', 'Something went wrong');
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function LoadMore()
    {
        $this->load += 3;
    }
}
