<?php

namespace App\Http\Livewire\Dashboard\Client\Reservations;

use Livewire\Component;
use App\Helpers\Client\Client;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Viewslots extends Component
{
    public $reservation;
    public $take = 5;
    public function render()
    {
        $slots = Business::Slots($this->reservation->id, $this->take);
        return view('livewire.dashboard.client.reservations.viewslots')
        ->with([
            'reservation' => $this->reservation,
            'slots' => $slots,
        ]);
    }

    public function LoadMore()
    {
        $this->take += 3;
    }

    public function BookNow($id)
    {
        return Client::BookReservation(Auth::user()->id, $id);
    }

    public function CancelNow($id)
    {
        return Client::CancelBooking(Auth::user()->id, $id);
    }
}
