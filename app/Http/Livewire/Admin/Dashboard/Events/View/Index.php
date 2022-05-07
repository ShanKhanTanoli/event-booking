<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\View;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $event;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;

    public function mount($event)
    {
        //Begin::If Event Exists
        if ($event = Event::Find($event)) {
            $this->event = $event;
        } else {
            session()->flash('error', 'No such event found');
            return redirect(route('AdminEvents'));
        }
        //End::If event Exists
    }

    public function render()
    {
        return view('livewire.admin.dashboard.events.view.index')
            ->extends('layouts.dashboard');
    }
}
