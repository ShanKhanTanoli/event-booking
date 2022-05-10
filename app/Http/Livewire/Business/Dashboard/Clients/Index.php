<?php

namespace App\Http\Livewire\Business\Dashboard\Clients;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $delete;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount($lang = "en")
    {
        App::setLocale($lang);
    }

    public function render()
    {
        $clients = Business::ClientsLatestPaginate(Auth::user()->id, 10);
        return view('livewire.business.dashboard.clients.index')
            ->with(['clients' => $clients])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($client = Business::FindClient(Auth::user()->id, $id)) {
            return redirect(route('BusinessEditClient', ['slug' => $client->slug, 'lang' => App::getLocale()]));
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function DeleteConfirmation($id)
    {
        if ($business = Business::FindClient(Auth::user()->id, $id)) {
            $this->delete = $business;
            $this->emit(['delete']);
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Delete($id)
    {
        if ($client = Business::FindClient(Auth::user()->id, $id)) {
            $client->delete();
            session()->flash('success', trans('alerts.delete'));
            return redirect(route('BusinessClients', App::getLocale()));
        } else return session()->flash('error', trans('alerts.error'));
    }
}
