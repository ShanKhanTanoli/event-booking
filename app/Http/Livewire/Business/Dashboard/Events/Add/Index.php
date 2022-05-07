<?php

namespace App\Http\Livewire\Business\Dashboard\Events\Add;

use Exception;
use Livewire\Component;

class Index extends Component
{
    public $price, $balance, $expires_at, $quantity;
    public function render()
    {
        return view('livewire.business.dashboard.events.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $msg = [
            'price.required' => 'Enter Price',
            'price.numeric' => 'Enter Price',

            'balance.required' => 'Enter  Balance',
            'balance.numeric' => 'Enter  Balance',

            'expires_at.required' => 'Enter Date',
            'expires_at.date' => 'Enter Date',

            'quantity.required' => 'Enter Quantity',
            'quantity.date' => 'Enter Quantity',

        ];
        $validated = $this->validate([
            'price' => 'required|numeric',
            'balance' => 'required|numeric',
            'expires_at' => 'required|date',
            'quantity' => 'required|numeric|digits_between:1,2',
        ], $msg);
        try {
            session()->flash('success', 'Added Successfully');
            return redirect(route('BusinessCards'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
