<?php

namespace App\Http\Livewire\Admin\Dashboard\Business\Mails;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Helpers\Business\Business;
use App\Models\Mail;
use Illuminate\Support\Facades\App;

class Index extends Component
{
    public $user, $view;
    
    public function mount($slug)
    {
        App::setLocale(Admin::Language());
        $this->user = User::where('slug', $slug)
            ->first();
        if (!$this->user) {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminBusiness', App::getLocale()));
        }
    }

    public function render()
    {
        $mails = Business::MailsLatestPaginate($this->user->id, 10);
        return view('livewire.admin.dashboard.business.mails.index')
            ->with(['mails' => $mails])
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function ViewMail($id)
    {
        if ($mail = Mail::find($id)) {
            $this->view = $mail;
            $this->emit('view');
        } else {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminBusinessMails', ['slug' => $this->user->slug, 'lang' => App::getLocale()]));
        }
    }
}
