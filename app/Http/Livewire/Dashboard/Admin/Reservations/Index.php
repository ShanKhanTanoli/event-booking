<?php

namespace App\Http\Livewire\Dashboard\Admin\Reservations;

use App\Models\Slot;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $status;

    public $reservation;

    public $load = 3;

    public function render()
    {
        $reservations =  Admin::AllReservations()
            ->take($this->load)->get();

        return view('livewire.dashboard.admin.reservations.index')
            ->with([
                'reservations' => $reservations,
                'reservation' => $this->reservation,
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
                return session()->flash('success', 'Activated Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Archive($id)
    {
        if (Admin::Is(Auth::user()->id)) {

            if ($reservation = Admin::FindReservation($id)) {

                $reservation->update(['status' => 'archived']);
                return session()->flash('success', 'Archived Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function BanNow($id)
    {
        if (Admin::Is(Auth::user()->id)) {

            if ($reservation = Admin::FindReservation($id)) {

                $reservation->update(['status' => 'banned']);
                return session()->flash('success', 'Banned Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function UnBan($id)
    {
        if (Admin::Is(Auth::user()->id)) {

            if ($reservation = Admin::FindReservation($id)) {

                $reservation->update(['status' => 'active']);
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
            return session()->flash('success', 'Deleted Successfully');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function RequestDelete($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                $this->reservation = $reservation->id;
                return $this->emit('RequestDelete', $reservation->id);
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Delete()
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($this->reservation)) {
                $reservation->forceDelete();
                $this->emit('DeleteSuccess');
                return session()->flash('success', 'Deleted Successfully');
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }
}
