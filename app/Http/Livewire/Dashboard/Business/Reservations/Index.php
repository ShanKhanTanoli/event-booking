<?php

namespace App\Http\Livewire\Dashboard\Business\Reservations;

use App\Models\Slot;
use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $status;
    public $load = 5;

    public $reservation;

    public function mount()
    {
        return Auth::user()->reservations->take($this->load);
    }
    public function render()
    {
        $reservations =  $this->mount();
        return view('livewire.dashboard.business.reservations.index')
            ->with([
                'reservations' => $reservations,
            ]);
    }

    public function Activate($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $id)) {
                Business::Reservation(Auth::user()->id, $id)->update(['status' => 'active']);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('BusinessReservations'));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Archive($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $id)) {
                Business::Reservation(Auth::user()->id, $id)->update(['status' => 'archived']);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('BusinessReservations'));
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
                    $this->reservation = $reservation->id;
                    return $this->emit('RequestDelete', $reservation->id);
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Delete()
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $this->reservation)) {
                if ($reservation = Business::Reservation(Auth::user()->id, $this->reservation)) {
                    Business::Reservation(Auth::user()->id, $this->reservation)
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
            if (!is_null($slot = Slot::find($id))) {
                if (!Business::ReservationIsBanned(Auth::user()->id, $slot->reservation_id)) {
                    $slot->delete();
                    session()->flash('success', 'Deleted Successfully');
                    return redirect(route('BusinessReservations'));
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function LoadMore()
    {
        $this->load += 3;
    }
}
