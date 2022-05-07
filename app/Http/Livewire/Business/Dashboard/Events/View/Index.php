<?php

namespace App\Http\Livewire\Business\Dashboard\Events\View;

use Livewire\Component;
use App\Helpers\Card\Card;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $card, $balance, $description;

    public $redeem_quantity = 3;
    public $recharge_quantity = 3;

    public function mount($slug)
    {
        //Begin::If this Business owns this event
        if ($card = Business::FindEvent(Auth::user()->id, $slug)) {
            $this->card = $card;
        } else {
            session()->flash('error', 'No such card found');
            return redirect(route('BusinessEvents'));
        }
        //End::If this Business owns this event
    }

    public function render()
    {
        $recharge = Card::Recharge($this->card->id)
            ->latest()
            ->take($this->recharge_quantity)
            ->get();
        $redeeming = Card::Redeem($this->card->id)
            ->latest()
            ->take($this->redeem_quantity)
            ->get();
        return view('livewire.business.dashboard.events.view.index')
            ->with([
                'recharge' => $recharge,
                'redeeming' => $redeeming
            ])->extends('layouts.dashboard');
    }


    public function LoadMoreRechargingHistory()
    {
        return $this->recharge_quantity += 3;
    }

    public function LoadMoreRedeemingHistory()
    {
        return $this->redeem_quantity += 3;
    }
}
