<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;

class Emailverification extends Component
{
    use VerifiesEmails;
    
    public function render()
    {
        return view('livewire.auth.emailverification');
    }

    public function ResendVerification(Request $request)
    {
       $this->resend($request);
    }
}
