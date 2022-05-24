<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\Edit;

use Exception;
use Livewire\Component;
use App\Helpers\Event\Event;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $event, $name, $user_id;

    public function mount($slug)
    {
        if ($event = Event::FindBySlug($slug)) {
            $this->event = $event;
            $this->name = $event->name;
            $this->user_id = $event->user_id;
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminEvents', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.events.edit.index')
            ->extends('layouts.dashboard');
    }

    public function Update()
    {
        //Begin::If Event Exists
        if (Event::FindBySlug($this->event->slug)) {
            $validated = $this->validate([
                'name' => 'required|string',
                'user_id' => 'required|numeric',
            ]);
            try {
                $this->event->update($validated);
                session()->flash('success', trans('alerts.update'));
                return redirect(route('AdminEditEvent', ['slug' => $this->event->slug, 'lang' => App::getLocale()]));
            } catch (Exception $e) {
                return session()->flash('error', $e->getMessage());
            }
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminEvents', App::getLocale()));
        }
    }
}
