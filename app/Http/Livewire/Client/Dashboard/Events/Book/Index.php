<?php

namespace App\Http\Livewire\Client\Dashboard\Events\Book;

use Exception;
use Livewire\Component;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $event;

    public function mount($slug)
    {
        //Begin::If this Client has an event
        if ($event = Client::FindEvent(Auth::user()->id, $slug)) {
            $this->event = $event;
        } else {
            session()->flash('error', 'No such event found');
            return redirect(route('ClientEvents'));
        }
        //End::If this Client has an event
    }

    public function render()
    {
        return view('livewire.client.dashboard.events.book.index')
            ->extends('layouts.dashboard');
    }

    public function Recharge()
    {
        $validated = $this->validate([
            'holder_name' => 'required|string',
            'card_number' => 'required|numeric',
            'card_cvc' => 'required|numeric',
            'card_expiry' => 'required|date',
            'balance' => 'required|numeric',
        ]);

        $card_data = [
            'name' => $validated['holder_name'],
            'number' => $validated['card_number'],
            'exp_year' => date('Y', strtotime($validated['card_expiry'])),
            'exp_month' => date('m', strtotime($validated['card_expiry'])),
            'cvc' => $validated['card_cvc'],
        ];

        $balance = $validated['balance'];
        try {
            return redirect(route('ClientBookEvent', $this->event->slug));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }

        //4242424242424242
    }
}
