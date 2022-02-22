<?php

namespace App\Http\Livewire\Dashboard\Admin\Reservations;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Edit extends Component
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
        return view('livewire.dashboard.admin.reservations.edit');
    }

    public function Update()
    {
        if (Admin::Is(Auth::user()->id)) {
            $msg = [
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
                'end_date' => 'required|date|after_or_equal:start_date',
                'start_time' => 'required|date_format:H:i:s',
                'end_time' => 'required|date_format:H:i:s|after:start_time',
                'token_cost' => 'required|numeric',
                'capacity' => 'required|numeric',
                'status' => 'required|in:active,archived',
                'can_book_before' => 'required|numeric',
                'can_cancel_before' => 'required|numeric',
            ], $msg)->validate();
            if ($this->reservation->update($validated)) {
                return session()->flash('success', 'Updated Successfully');
            } else return session()->flash('error', 'Something went wrong while Updating');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Activate($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                $reservation->update(['status' => 'active']);
                session()->flash('success', 'Activated Successfully');
                return redirect(route('AdminEditReservation',$reservation->slug));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function Archive($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                $reservation->update(['status' => 'archived']);
                session()->flash('success', 'Archived Successfully');
                return redirect(route('AdminEditReservation',$reservation->slug));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function BanNow($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                $reservation->update(['status' => 'banned']);
                session()->flash('success', 'Banned Successfully');
                return redirect(route('AdminEditReservation',$reservation->slug));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }

    public function UnBan($id)
    {
        if (Admin::Is(Auth::user()->id)) {
            if ($reservation = Admin::FindReservation($id)) {
                $reservation->update(['status' => 'active']);
                session()->flash('success', 'Activated Successfully');
                return redirect(route('AdminEditReservation',$reservation->slug));
            } else return session()->flash('error', 'Something went wrong');
        } else return session()->flash('error', 'Something went wrong');
    }
}
