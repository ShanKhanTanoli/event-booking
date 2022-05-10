<?php

namespace App\Http\Livewire\Admin\Dashboard\Business;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
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
        $business = Business::LatestPaginate(10);
        return view('livewire.admin.dashboard.business.index')
            ->with(['business' => $business])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function Edit($id)
    {
        if ($business = User::find($id)) {
            return redirect(route('AdminEditBusiness', ['slug' => $business->slug, 'lang' => App::getLocale()]));
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
        if ($business = User::find($id)) {
            $business->delete();
            session()->flash('success', trans('alerts.delete'));
            return redirect(route('AdminBusiness', App::getLocale()));
        }
        return session()->flash('error', trans('alerts.error'));
    }
}
