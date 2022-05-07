<?php

namespace App\Http\Livewire\Business\Dashboard\Events;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $delete;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $events = Business::EventsLatestPaginate(Auth::user()->id, 10);
        return view('livewire.business.dashboard.events.index')
            ->with(['events' => $events])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($slug)
    {
        return redirect(route('BusinessViewEvent', $slug));
    }


    public function Edit($slug)
    {
        return redirect(route('BusinessEditEvent', $slug));
    }

    public function DeleteConfirmation($slug)
    {
        if ($event = Business::FindEvent(Auth::user()->id, $slug)) {
            $this->delete = $event;
            $this->emit(['delete']);
        } else return session()->flash('error', 'No such event found');
    }

    public function Delete($id)
    {
        if ($event = Business::FindEventById(Auth::user()->id, $id)) {
            $event->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('BusinessEvents'));
        } else return session()->flash('error', 'No such event found');
    }
}
