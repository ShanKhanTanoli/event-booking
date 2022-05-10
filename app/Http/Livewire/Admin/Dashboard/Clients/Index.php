<?php

namespace App\Http\Livewire\Admin\Dashboard\Clients;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $delete;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        App::setLocale(Admin::Language());
    }

    public function render()
    {
        $clients = Client::LatestPaginate(10);
        return view('livewire.admin.dashboard.clients.index')
            ->with(['clients' => $clients])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($client = User::find($id)) {
            return redirect(route('AdminEditClient', ['slug' => $client->slug, 'lang' => App::getLocale()]));
        }
        return session()->flash('error', trans('alerts.error'));
    }

    public function DeleteConfirmation($id)
    {
        if ($business = User::find($id)) {
            $this->delete = $business;
            $this->emit(['delete']);
        } else return session()->flash('error', trans('alerts.error'));
    }

    public function Delete($id)
    {
        if ($client = User::find($id)) {
            $client->delete();
            session()->flash('success', trans('alerts.delete'));
            return redirect(route('AdminClients', App::getLocale()));
        }
        return session()->flash('error', trans('alerts.error'));
    }
}
