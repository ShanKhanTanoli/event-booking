<?php

namespace App\Http\Livewire\Admin\Dashboard\Business\Clients;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $user, $delete;

    public function mount($slug)
    {
        App::setLocale(Admin::Language());

        if ($business = Business::FindBySlug($slug)) {
            $this->user = $business;
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminBusiness', App::getLocale()));
        }
    }

    public function render()
    {
        $clients = Business::ClientsLatestPaginate($this->user->id, 10);
        return view('livewire.admin.dashboard.business.clients.index')
            ->with(['clients' => $clients])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($client = User::find($id)) {
            return redirect(route('AdminBusinessClients', ['slug' => $client->slug, 'lang' => App::getLocale()]));
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
            return redirect(route('AdminBusinessClients', ['slug' => $this->user->slug, App::getLocale()]));
        }
        return session()->flash('error', trans('alerts.error'));
    }
}
