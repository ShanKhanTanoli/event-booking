<?php

namespace App\Http\Livewire\Dashboard\Business\Reservations;

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
        if ($this->status == 'all') {
            $reservations =  $reservations->take($this->load);
        }
        if ($this->status == 'active') {
            $reservations =  Business::ActiveReservations(Auth::user()->id)->take($this->load);
        }
        if ($this->status == 'archived') {
            $reservations =  Business::ArchivedReservations(Auth::user()->id)->take($this->load);
        }
        if ($this->status == 'banned') {
            $reservations =  Business::BannedReservations(Auth::user()->id)->take($this->load);
        }
        return view('livewire.dashboard.business.reservations.index', compact(['reservations', $this->reservation]));
    }

    public function Activate($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $id)) {
                Business::Reservation(Auth::user()->id, $id)->update(['status' => 'active']);
                return session()->flash('success', 'Archived Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Archive($id)
    {
        if (Business::Is(Auth::user()->id)) {
            if (!Business::ReservationIsBanned(Auth::user()->id, $id)) {
                Business::Reservation(Auth::user()->id, $id)->update(['status' => 'archived']);
                return session()->flash('success', 'Activated Successfully');
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
                    return session()->flash('success', 'Deleted Successfully');
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function LoadMore()
    {
        $this->load += 3;
    }
}
