<?php

namespace App\Http\Livewire\Dashboard\Client\Reservations;

use Livewire\Component;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Myreservations extends Component
{
    public $type;
    public $load = 6;

    public function render()
    {
        $reservations = Client::AllBookings(Auth::user()->id)
            ->take($this->load)->get();

        $ids = $reservations->pluck('slot_id')
            ->unique()->toArray();

        $slots = Client::BookedSlots($ids);

        return view('livewire.dashboard.client.reservations.myreservations')
            ->with([
                'reservations' => $reservations,
                'slots' => $slots,
            ]);
    }

    public function View($id)
    {
        if (!is_null($reservation = $this->mount()->find($id))) {
            return redirect(route('ClientViewReservation', $reservation->slug));
        } else return session()->flash('error', 'Something went wrong');
    }

    public function CancelNow($id)
    {
        return Client::CancelBooking(Auth::user()->id, $id);
    }

    public function LoadMore()
    {
        $this->load += 3;
    }
}
