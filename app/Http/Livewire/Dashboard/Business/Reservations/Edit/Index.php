<?php

namespace App\Http\Livewire\Dashboard\Business\Reservations\Edit;

use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    public $reservation;

    public $state = [];

    public function mount()
    {
        $this->state = $this->reservation->only([
            'name', 'start_date', 'end_date', 'start_time', 'end_time', 'token_cost', 'capacity', 'status', 'can_book_before', 'can_cancel_before',
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.business.reservations.edit.index');
    }

    public function Update()
    {
        if (Business::Is(Auth::user()->id)) {
            if (Business::CanUpdateReservation(Auth::user()->id)) {
                if (!Business::ReservationIsBanned(Auth::user()->id, $this->reservation->id)) {
                    if ($reservation = Business::Reservation(Auth::user()->id,  $this->reservation->id)) {
                        $validated = Validator::make($this->state, [
                            'name' => 'required|string',
                            'status' => 'required|in:active,archived',
                        ])->validate();
                        if ($reservation->update($validated)) {
                            return session()->flash('success', 'Updated Successfully');
                        } else return session()->flash('error', 'Something went wrong while Updating');
                    } else return session()->flash('error', 'Something went wrong');
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'You are not allowed to update Reservation');
        } else return session()->flash('error', 'Something went wrong');
    }
}
