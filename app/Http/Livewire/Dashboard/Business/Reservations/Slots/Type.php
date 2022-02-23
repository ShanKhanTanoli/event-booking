<?php

namespace App\Http\Livewire\Dashboard\Business\Reservations\Slots;

use Livewire\Component;

class Type extends Component
{
    public $reservation;

    public function render()
    {
        return view('livewire.dashboard.business.reservations.slots.type')
        ->with([
            'reservation' => $this->reservation,
        ]);
    }

    public function AddSpecificDays()
    {
        return redirect(route('BusinessReservationSpecificDaySlots', $this->reservation->slug));
    }

    public function AddDaily()
    {
        return redirect(route('BusinessReservationDailySlots', $this->reservation->slug));
    }

    public function AddWeekly()
    {
        return redirect(route('BusinessReservationWeeklySlots', $this->reservation->slug));
    }
}
