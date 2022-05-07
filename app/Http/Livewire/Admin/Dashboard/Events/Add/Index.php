<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\Add;

use Exception;
use Livewire\Component;

class Index extends Component
{
    public $price, $balance, $expires_at, $quantity, $user_id;
    public function render()
    {
        return view('livewire.admin.dashboard.events.add.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $msg = [
            'user_id.required' => 'Enter Price',
            'user_id.numeric' => 'Enter Price',
            'price.required' => 'Enter Price',
            'price.numeric' => 'Enter Price',
            'balance.required' => 'Enter Balance Amount',
            'balance.numeric' => 'Enter Balance Amount',
            'expires_at.required' => 'Enter Date',
            'expires_at.date' => 'Enter Date',
            'quantity.required' => 'Enter Quantity',
            'quantity.numeric' => 'Enter Quantity',
        ];
        $validated = $this->validate([
            'user_id' => 'required|numeric',
            'price' => 'required|numeric',
            'balance' => 'required|numeric',
            'expires_at' => 'required|date',
            'quantity' => 'required|numeric',
        ], $msg);

        try {
            session()->flash('success', 'Added Successfully');
            return redirect(route('AdminEvents'));
        } catch (Exception $e) {
            return session()->flash('error', $e->getMessage());
        }
    }
}
