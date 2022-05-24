<?php

namespace App\Http\Livewire\Admin\Dashboard\Events;

use Livewire\Component;
use App\Helpers\Event\Event;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;

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
        return redirect(route('AdminViewEvent', ['slug' => $slug, 'lang' => App::getLocale()]));
    }


    public function AddSlots($slug)
    {
        return redirect(route('AdminSlotTypes', ['slug' => $slug, 'lang' => App::getLocale()]));
    }


    public function Edit($slug)
    {
        if ($event = Event::FindBySlug($slug)) {
            return redirect(route('AdminEditEvent', ['slug' => $event->slug, 'lang' => App::getLocale()]));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function DeleteConfirmation($slug)
    {
        if ($event = Event::FindBySlug($slug)) {
            $this->delete = $event;
            $this->emit(['delete']);
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Delete($id)
    {
        if ($event = Event::FindById($id)) {
            $event->delete();
            session()->flash('success', trans('alerts.delete'));
            return redirect(route('AdminEvents', ['lang' => App::getLocale()]));
        } else return session()->flash('error', trans('alerts.error'));
    }
}
