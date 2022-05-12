<?php

namespace App\Http\Livewire\Admin\Dashboard\Clients\Mails\Send;

use Exception;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Admin\Admin;
use App\Models\Mail as ModelsMail;
use App\Mail\SendNotificationsMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class Index extends Component
{
    public $user;

    public $subject, $message;

    public function mount($slug)
    {
        App::setLocale(Admin::Language());
        $this->user = User::where('slug', $slug)
            ->first();
        if (!$this->user) {
            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminClients', App::getLocale()));
        }
    }

    public function render()
    {
        return view('livewire.admin.dashboard.clients.mails.send.index')
            ->extends('layouts.dashboard')
            ->section('content');
    }

    public function SendMail()
    {

        $validated = $this->validate([
            'subject' => 'required:string',
            'message' => 'required:string',
        ]);

        try {

            ModelsMail::create([
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'user_id' => $this->user->id,
                'read' => 0,
                'slug' => strtoupper(Str::random(10)),
            ]);
            //Mail Data
            $data = [
                'subject' => $validated['subject'],
                'message' => $validated['message'],
            ];
            Mail::to($this->user)->send(new SendNotificationsMail($data));
            session()->flash('success', trans('alerts.mail-sent'));
            return redirect(route('AdminSendClientMail', ['slug' => $this->user->slug, 'lang' => App::getLocale()]));
        } catch (Exception $e) {

            session()->flash('error', trans('alerts.error'));
            return redirect(route('AdminSendClientMail', ['slug' => $this->user->slug, 'lang' => App::getLocale()]));
        }
    }
}
