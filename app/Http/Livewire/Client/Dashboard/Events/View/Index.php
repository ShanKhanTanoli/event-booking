<?php

namespace App\Http\Livewire\Client\Dashboard\Events\View;

use App\Helpers\Card\Card;
use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $event;

    public function mount($slug)
    {
        //Begin::If this Client owns has event
        if ($event = Client::FindEvent(Auth::user()->id, $slug)) {
            $this->event = $event;
        } else {
            session()->flash('error', 'No such event found');
            return redirect(route('ClientEvents'));
        }
        //End::If this Client owns has event
    }

    public function render()
    {
        //$events = Card::LatestRechargePaginate($this->card->id, 6);
        $events = null;
        return view('livewire.client.dashboard.events.view.index')
            ->with(['events' => $events])
            ->extends('layouts.dashboard');
    }
}
