<?php

namespace App\Http\Livewire\Client\Dashboard\Events;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }

    public function render()
    {
        $events = Client::LatestEventsPaginate(Auth::user()->id, 10);
        return view('livewire.client.dashboard.events.index')
            ->with(['events' => $events])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function View($slug)
    {
        return redirect(route('ClientViewEvent', $slug));
    }

    public function Book($slug)
    {
        return redirect(route('ClientBookEvent', $slug));
    }
}
