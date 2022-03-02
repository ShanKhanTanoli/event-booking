<?php

namespace App\Http\Livewire\Dashboard\Client\Reservations;

use Livewire\Component;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $type;
    public $load = 6;

    public function mount()
    {
        return Client::JoinedBusinessReservations(Auth::user()->id)
            ->where('status', 'active');
    }
    public function render()
    {
        $reservations = $this->mount();
        $reservations = $reservations->take($this->load);

        return view('livewire.dashboard.client.reservations.index')
            ->with([
                'reservations' => $reservations,
            ]);
    }

    public function LoadMore()
    {
        $this->load += 3;
    }

    public function View($id)
    {
        if (!is_null($reservation = $this->mount()->find($id))) {
            return redirect(route('ClientViewReservation', $reservation->slug));
        } else return session()->flash('error', 'Something went wrong');
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
