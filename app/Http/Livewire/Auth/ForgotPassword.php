<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Redirect;

use Illuminate\Support\Facades\App;
use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;

class ForgotPassword extends Component
{
    use Notifiable;

    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function mount($lang = "en")
    {
        App::getLocale($lang);
        if (auth()->user()) {
            redirect(Redirect::ToDashboard());
        }
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function recoverPassword()
    {
        $this->validate();
        $user = User::where('email', $this->email)->first();
        if ($user) {
            $this->notify(new ResetPassword($user->id));
            return session()->flash('success', 'A password reset link has been sent to ' . $this->email);
        } else {
            return session()->flash('error', 'Email not found');
        }
    }

    public function render()
    {
        return view('livewire.auth.passwords.email')
            ->extends('layouts.auth')
            ->section('content');
    }
}
