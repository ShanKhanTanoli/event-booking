<?php

namespace App\Http\Livewire\Business\Dashboard\Clients\Mails\Send;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }

    public function render()
    {
        return view('livewire.business.dashboard.clients.mails.send.index');
    }
}
