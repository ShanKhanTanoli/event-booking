<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\View;

use Livewire\Component;
use App\Helpers\Event\Event;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

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
        return view('livewire.admin.dashboard.events.view.index')
            ->extends('layouts.dashboard');
    }
}
