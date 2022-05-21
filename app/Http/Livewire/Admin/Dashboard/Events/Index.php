<?php

namespace App\Http\Livewire\Admin\Dashboard\Events;

use Livewire\Component;
use App\Helpers\Event\Event;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $delete;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $events = Event::LatestPaginate(10);
        return view('livewire.admin.dashboard.events.index')
            ->with(['events' => $events])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($slug)
    {
        return redirect(route('AdminViewEvent', $slug));
    }


    public function Edit($slug)
    {
        if ($event = Event::Find($slug)) {
            return redirect(route('AdminEditEvent', $event->slug));
        } else return session()->flash('error', 'No such event found');
    }

    public function DeleteConfirmation($slug)
    {
        if ($event = Event::Find($slug)) {
            $this->delete = $event;
            $this->emit(['delete']);
        } else return session()->flash('error', 'No such event found');
    }

    public function Delete($id)
    {
        if ($event = Event::FindById($id)) {
            $event->delete();
            session()->flash('success', 'Deleted Successfully');
            return redirect(route('AdminEvents'));
        } else return session()->flash('error', 'No such event found');
    }
}
