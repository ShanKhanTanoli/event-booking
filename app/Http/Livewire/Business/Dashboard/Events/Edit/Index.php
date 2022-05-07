<?php

namespace App\Http\Livewire\Business\Dashboard\Events\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $event, $price, $balance, $expires_at;

    public function mount($slug)
    {
        //Begin::If this Business has this event
        if ($event = Business::FindEvent(Auth::user()->id, $slug)) {
            //Begin::If this event is booked
            if (!$event->isSold()) {
                $this->event = $event;
                $this->price = $event->price;
                $this->balance = $event->balance;
                $this->expires_at = date('Y-m-d', strtotime($event->expires_at));
            } else {
                session()->flash('error', 'This event is already sold');
                return redirect(route('BusinessViewEvent', $event->slug));
            }
            //End::If this event is booked

        } else {
            session()->flash('error', 'No such event found');
            return redirect(route('BusinessEvents'));
        }
        //End::If this Business has this event
    }

    public function render()
    {
        return view('livewire.business.dashboard.events.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If this Business has this event
        if (Business::FindEvent(Auth::user()->id, $this->event->slug)) {
            $validated = $this->validate([
                'price' => 'required|integer',
                'balance' => 'required|integer',
                'expires_at' => 'required|date',
            ]);
            try {
                $this->event->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditEvent', $this->event->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such event found');
            return redirect(route('BusinessEvents'));
        }
    }
}
