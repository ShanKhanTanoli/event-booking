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
        dd('Specific');
    }

    public function Daily()
    {
        dd('daily');
    }

    public function Weekly()
    {
        dd('weekly');
    }
}
