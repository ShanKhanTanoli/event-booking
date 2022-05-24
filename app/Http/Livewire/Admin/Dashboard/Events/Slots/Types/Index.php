<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\Slots\Types;

use Livewire\Component;
use App\Helpers\Event\Event;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $slug, $event;

    public function mount($slug)
    {
        if ($event = Event::FindBySlug($slug)) {
            $this->event = $event;
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminEvents', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.events.slots.types.index')
            ->extends('layouts.dashboard');
    }

    public function SpecificDays()
    {
        return redirect(route('AdminAddSpecificDays', ['slug' => $this->event->slug, 'lang' => App::getLocale()]));
    }

    public function Daily()
    {
        return redirect(route('AdminAddDaily', ['slug' => $this->event->slug, 'lang' => App::getLocale()]));
    }

    public function Weekly()
    {
        return redirect(route('AdminAddWeekly', ['slug' => $this->event->slug, 'lang' => App::getLocale()]));
    }
}
