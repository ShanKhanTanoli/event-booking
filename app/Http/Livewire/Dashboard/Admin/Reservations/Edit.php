<?php

namespace App\Http\Livewire\Dashboard\Admin\Reservations;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class Edit extends Component
{
    public $reservation;

    public $state = [];

    public function mount()
    {
        $this->state = $this->reservation->only([
            'name', 'status',
        ]);
    }
    public function render()
    {
        return view('livewire.dashboard.admin.reservations.edit.index')
            ->with([
                'reservation' => $this->reservation,
            ]);
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string',
            'status' => 'required|string|in:active,archived',
        ])->validate();

        if ($this->reservation->update($validated)) {
            return session()->flash('success', 'Updated Successfully');
        } else return session()->flash('error', 'Something went wrong');
    }
}
