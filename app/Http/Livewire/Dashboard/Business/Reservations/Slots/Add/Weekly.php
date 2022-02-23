<?php

namespace App\Http\Livewire\Dashboard\Business\Reservations\Slots\Add;

use DateTime;
use DatePeriod;
use DateInterval;
use App\Models\Slot;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Weekly extends Component
{
    public $reservation;

    public $state = [];

    public function render()
    {
        return view('livewire.dashboard.business.reservations.slots.add.weekly')
            ->with([
                'reservation' => $this->reservation,
            ]);
    }

    public function AddSlots()
    {
        if (Business::Is(Auth::user()->id)) {
            if (Business::CanUpdateReservation(Auth::user()->id)) {
                $msg = [
                    'start_time.date_format' => 'Please check Starting Time',
                    'end_time.date_format' => 'Please check Starting Time',
                    'end_date.after_or_equal' => 'Ending Date must be equal to or greater than Starting Date',
                    'end_time.after' => 'Ending Time must be greater than Starting Time',
                    'can_book_before.required' => 'Enter Minutes',
                    'can_book_before.numeric' => 'Enter Minutes',
                    'can_cancel_before.required' => 'Enter Minutes',
                    'can_cancel_before.numeric' => 'Enter Minutes',
                ];
                $validated = Validator::make($this->state, [
                    'name' => 'required|string',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date|after:start_date',
                    'start_time' => 'required|date_format:H:i',
                    'end_time' => 'required|date_format:H:i|after:start_time',
                    'capacity' => 'required|numeric',
                    'can_book_before' => 'required|numeric',
                    'can_cancel_before' => 'required|numeric',
                ], $msg)->validate();

                $begin = new DateTime($validated['start_date']);
                $end = new DateTime($validated['end_date']);
                $end = $end->modify('+1 day');
                $interval = new DateInterval('P1D');
                $daterange = new DatePeriod($begin, $interval, $end);
                $slot_id = strtoupper(Str::random(10));
                foreach ($daterange as $date) {
                    if ($date->format("D") != 'Sat' and $date->format("D") != 'Sun') {
                        Slot::create([
                            'name' => $validated['name'],
                            'slot_id' => $slot_id,
                            'reservation_id' => $this->reservation->id,
                            'slug' => strtoupper(Str::random(10)),
                            'starting_date' => $date->format("Y-m-d"),
                            'ending_date' => $date->format("Y-m-d"),
                            'starting_time' => $validated['start_time'],
                            'ending_time' => $validated['end_time'],
                            'type' => 'weekly',
                            'capacity' => $validated['capacity'],
                            'can_book_before' => $validated['can_book_before'],
                            'can_cancel_before' => $validated['can_cancel_before'],
                        ]);
                    }
                }
                session()->flash('success', 'Slots Added Successfully');
                return redirect(route('BusinessReservations'));
            } else return session()->flash('error', 'You are not allowed to add slots to this Reservation');
        } else return session()->flash('error', 'Something went wrong');
    }
}
