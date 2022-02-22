<?php

namespace App\Http\Livewire\Dashboard\Business\Subscriptions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Rinvex\Subscriptions\Models\Plan;

class All extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $subscriptions = Business::Subscriptions(Auth::user()->id)->latest()->paginate(6);
        return view('livewire.dashboard.business.subscriptions.all',compact('subscriptions'));
    }
    
    public function End($invoice)
    {
        return Business::EndSubscription(Auth::user()->id, $invoice);
    }
}
