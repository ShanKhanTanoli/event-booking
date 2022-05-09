<?php

namespace App\Http\Livewire\Client\Dashboard\Payments;

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
        $payments = Client::LatestPaymentsPaginate(Auth::user()->id, 10);
        return view('livewire.client.dashboard.payments.index')
            ->with(['payments' => $payments])
            ->extends('layouts.dashboard')
            ->section('content');
    }
}
