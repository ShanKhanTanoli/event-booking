<?php

namespace App\Http\Livewire\Admin\Dashboard\Notifications;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        App::setLocale(Admin::Language());
    }

    public function render()
    {
        $notifications = Auth::user()->notifications()
            ->latest()
            ->paginate(10);
        return view('livewire.admin.dashboard.notifications.index')
            ->with(['notifications' => $notifications])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function MarkRead($id)
    {
        if ($notification = Auth::user()->notifications()->find($id)) {
            $notification->markasread();
            session()->flash('success', trans('alerts.mark-read'));
            return redirect(route('AdminNotifications', App::getLocale()));
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminNotifications', App::getLocale()));
        }
    }
}
