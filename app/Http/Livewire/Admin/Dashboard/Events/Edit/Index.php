<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\Edit;

use Exception;
use Livewire\Component;

class Index extends Component
{
    public $event;

    public function mount($slug)
    {
        if ($event = Event::Find($slug)) {
            $this->event = $event;
        } else {
            session()->flash('error', 'No such event found');
            return redirect(route('AdminEvents'));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.events.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If Card Exists
        if (Card::Find($this->card->slug)) {
            $msg = [
                'user_id.required' => 'Enter Price',
                'user_id.numeric' => 'Enter Price',
                'price.required' => 'Enter Price',
                'price.numeric' => 'Enter Price',
                'balance.required' => 'Enter Balance Amount',
                'balance.numeric' => 'Enter Balance Amount',
                'expires_at.required' => 'Enter Date',
                'expires_at.date' => 'Enter Date',
            ];
            $validated = $this->validate([
                'user_id' => 'required|numeric',
                'price' => 'required|numeric',
                'balance' => 'required|numeric',
                'expires_at' => 'required|date',
            ], $msg);
            try {
                $this->event->update($validated);
                session()->flash('success', 'Updated Successfully');
                return redirect(route('AdminEditEvent', $this->event->slug));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', 'No such event found');
            return redirect(route('AdminEvents'));
        }
    }
}
