<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Client\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientReservationController extends Controller
{
    protected $path = 'dashboard.client.';

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'client']);
    }

    public function Reservations()
    {
        return view($this->path . 'reservations.index');
    }

    public function MyReservations()
    {
        return view($this->path . 'reservations.myreservations');
    }

    public function ViewReservationSlots($slug)
    {
        $reservation = Client::JoinedBusinessReservations(Auth::user()->id)
            ->where('status', 'active')->where('slug', $slug)->first();
        if (!is_null($reservation)) {
            return view($this->path . 'reservations.viewslots', compact('reservation'));
        } else {
            session()->flash('error', 'Something went wrong');
            return redirect(route('Reservations'));
        }
    }
}
