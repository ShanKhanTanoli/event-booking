<?php

namespace App\Http\Livewire\Dashboard\Business\Reservations\Add;

use Livewire\Component;
use App\Models\Reservation;
use Illuminate\Support\Str;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    public $state = [];

    public function render()
    {
        return view('livewire.dashboard.business.reservations.add.index');
    }

    public function AddNow()
    {
        if (Business::Is(Auth::user()->id)) {
            if (Business::CanCreateReservation(Auth::user()->id)) {
                if ($subscription = Business::HasActiveSubscription(Auth::user()->id)) {
                    $created = Business::CountReservationWithSubscription(Auth::user()->id, $subscription->id);
                    $allowed = Business::ReservationsLimit(Auth::user()->id);
                    if (intval($created) < intval($allowed)) {
                        $validated = Validator::make($this->state, [
                            'name' => 'required|string',
                            'status' => 'required|in:active,archived',
                        ])->validate();
                        $data =  [
                            'name' => $validated['name'],
                            'slug' => strtoupper(Str::random(10)),
                            'user_id' => Auth::user()->id,
                            'subscription_id' => $subscription->id,
                            'status' => $validated['status'],
                        ];
                        if (Reservation::create($data)) {
                            session()->flash('success', 'Created Successfully');
                            return redirect(route('BusinessReservations'));
                        } else return session()->flash('error', 'Something went wrong while creating reservation');
                    } else return session()->flash('error', "Limit Exceeded.You can not create more than " . $allowed . " reservations");
                } else return session()->flash('error', "You don't have any active subscription");
            } else return session()->flash('error', 'You are not allowed to create Reservation');
        } else return session()->flash('error', 'Something went wrong');
    }
}
