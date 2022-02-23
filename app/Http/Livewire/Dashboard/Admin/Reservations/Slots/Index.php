<?php

namespace App\Http\Livewire\Dashboard\Admin\Reservations\Slots;

use App\Models\Slot;
use Livewire\Component;
use App\Models\Reservation;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $status;
    public $load = 6;

    public $reservation;

    public $delete_reservation;

    public function render()
    {
        $slots = $this->reservation->slots->take($this->load);
        return view('livewire.dashboard.admin.reservations.slots.index')
            ->with([
                'reservation' => $this->reservation,
                'slots' => $slots,
            ]);
    }

    public function LoadMore()
    {
        $this->load += 3;
    }

    public function Activate($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                $reservation->update(['status' => 'active']);
                redirect(route('AdminViewReservationSlots', $this->reservation->slug));
                return session()->flash('success', 'Activated Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Archive($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                $reservation->update(['status' => 'archived']);
                redirect(route('AdminViewReservationSlots', $this->reservation->slug));
                return session()->flash('success', 'Archived Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function BanNow($id)
    {
        if (Admin::Is(Auth::user()->id)) {

            if ($reservation = Admin::FindReservation($id)) {
                $reservation->update(['status' => 'banned']);
                redirect(route('AdminViewReservationSlots', $this->reservation->slug));
                return session()->flash('success', 'Banned Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function UnBan($id)
    {
        if (Admin::Is(Auth::user()->id)) {

            if ($reservation = Admin::FindReservation($id)) {
                $reservation->update(['status' => 'active']);
                redirect(route('AdminViewReservationSlots', $this->reservation->slug));
                return session()->flash('success', 'Activated Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }


    public function Edit($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                return redirect(route('AdminEditReservation', $reservation->slug));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function DeleteSlot($slot)
    {
        $find = Slot::find($slot);
        if (!is_null($find)) {
            $find->delete();
            redirect(route('AdminViewReservationSlots', $this->reservation->slug));
            return session()->flash('success', 'Deleted Successfully');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function RequestDelete($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                $this->delete_reservation = $reservation->id;
                return $this->emit('RequestDelete', $reservation->id);
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Delete()
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($this->delete_reservation)) {
                $reservation->forceDelete();
                $this->emit('DeleteSuccess');
                redirect(route('AdminReservations'));
                return session()->flash('success', 'Deleted Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }
}
