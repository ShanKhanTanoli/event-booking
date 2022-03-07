<?php

namespace App\Http\Livewire\Dashboard\Business\Reservations\Slots\Bookings;

use App\Models\User;
use App\Helpers\Slot;
use Livewire\Component;
use App\Helpers\Booking;
use Livewire\WithPagination;
use App\Models\ClientBooking;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $slot;

    public $client;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $bookings = Slot::Bookings($this->slot->id)
            ->paginate(20);
        return view('livewire.dashboard.business.reservations.slots.bookings.index')
            ->with([
                'bookings' => $bookings,
                'slot' => $this->slot,
            ]);
    }

    public function CancelBooking($booking)
    {
        if ($business = Business::Is(Auth::user()->id)) {
            if (!is_null($slot = Slot::FindBySlug($this->slot->slug))) {
                if (Business::Reservation(Auth::user()->id, $slot->reservation_id)) {
                    $booking = ClientBooking::find($booking);
                    if (!is_null($booking)) {
                        if ($booking->slot_id == $this->slot->id) {
                            $booking->forceDelete();
                            session()->flash('success', 'Cancelled Successfully');
                            return redirect(route('BusinessViewReservationBookings', $this->slot->slug));
                        } else return session()->flash('error', 'Something went wrong');
                    } else return session()->flash('error', 'Something went wrong');
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function CreateBooking()
    {
        $this->validate([
            'client' => 'required|string',
        ]);

        if ($business = Business::Is(Auth::user()->id)) {
            if (!is_null($slot = Slot::FindBySlug($this->slot->slug))) {
                if (Business::Reservation(Auth::user()->id, $slot->reservation_id)) {
                    if (!is_null($client = User::find($this->client))) {
                        if (Business::CheckClient($business->id, $client->id)) {
                            Booking::new($client->id,$slot->id,$business->user_name);
                            return redirect(route('BusinessViewReservationBookings', $slot->slug));
                        } else return session()->flash('error', 'Something went wrong');
                    } else return session()->flash('error', 'Something went wrong');
                } else return session()->flash('error', 'Something went wrong');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }
}
