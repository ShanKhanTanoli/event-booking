<?php

namespace App\Http\Livewire\Admin\Dashboard\Events\Slots\Add\Daily;

use DateTime;
use DatePeriod;
use DateInterval;
use App\Models\Slot;
use App\Helpers\Helper;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Event\Event;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $slug, $event;

    public $starting_date,
        $ending_date,
        $starting_time,
        $ending_time,
        $capacity,
        $can_book_before,
        $can_book_until,
        $can_cancel_before;

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
        return view('livewire.admin.dashboard.events.slots.add.daily.index')
            ->extends('layouts.dashboard');
    }

    public function Add()
    {
        $validated = $this->validate([
            'starting_date' => 'required|date',
            'ending_date' => 'required|date|after:starting_date',
            'starting_time' => 'required|date_format:H:i',
            'ending_time' => 'required|date_format:H:i|after:starting_time',
            'capacity' => 'required|numeric',
            'can_book_before' => 'required|numeric',
            'can_book_until' => 'required|numeric',
            'can_cancel_before' => 'required|numeric',
        ]);

        //Starting Date
        $begin = new DateTime($validated['starting_date']);
        //Ending Date
        $end = new DateTime($validated['ending_date']);

        $end = $end->modify('+1 day');
        $interval = new DateInterval('P1D');

        //Date Range
        $daterange = new DatePeriod($begin, $interval, $end);

        //Count Slot Duration
        $duration = Helper::CountSlotDuration($validated['starting_date'], $validated['ending_date']);
        if ($duration < 366) {
            foreach ($daterange as $date) {
                Slot::create([
                    'slot_id' => $this->event->slug,
                    'event_id' => $this->event->id,
                    'slug' => strtoupper(Str::random(10)),
                    'starting_date' => $date->format("Y-m-d"),
                    'ending_date' => $date->format("Y-m-d"),
                    'starting_time' => $validated['starting_time'],
                    'ending_time' => $validated['ending_time'],
                    'type' => 'daily',
                    'capacity' => $validated['capacity'],
                    'can_book_before' => $validated['can_book_before'],
                    'can_book_until' => $validated['can_book_until'],
                    'can_cancel_before' => $validated['can_cancel_before'],
                ]);
            }
            session()->flash('success', trans('alerts.add'));
            return redirect(route('AdminEvents', App::getLocale()));
        } else return session()->flash('error', trans('alerts.error'));
    }
}
