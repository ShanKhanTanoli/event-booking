<?php

namespace App\Http\Livewire\Dashboard\Business\Clients;

use Livewire\Component;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class All extends Component
{
    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public $email_status = 'all';

    public function mount()
    {
        return Business::Clients(Auth::user()->id)->latest();
    }

    public function render()
    {
        $clients = $this->mount();

        /*Begin::client Email Status*/
        if ($this->email_status == 'all') {
            $clients = Business::Clients(Auth::user()->id)->latest();
        }
        if ($this->email_status == 'verified') {
            $clients = Business::VerifiedClients(Auth::user()->id);
        }
        if ($this->email_status == 'unverified') {
            $clients = Business::UnverifiedClients(Auth::user()->id);
        }
        /*End::client Email Status*/

        $clients = $clients->paginate(6);
        return view('livewire.dashboard.business.clients.all', compact('clients'));
    }

    public function UnVerifyEmail($client)
    {
        if ($user = Business::ClientIsVerified(Auth::user()->id, $client)) {
            if (Business::CanVerifyClient(Auth::user()->id)) {
                $user->update(['email_verified_at' => null]);
                session()->flash('error', 'Email has been Unverified & Client needs to verify this Email');
            } else session()->flash('error', 'You are not Allowed to perform this action!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function VerifyEmail($client)
    {
        if ($user = Business::CheckClient(Auth::user()->id, $client)) {
            if (Business::CanVerifyClient(Auth::user()->id)) {
                $user->update(['email_verified_at' => now()]);
                session()->flash('success', 'Email has been Verified Successfully!');
            } else session()->flash('error', 'You are not Allowed to perform this action!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Edit($client)
    {
        if ($user = Business::CheckClient(Auth::user()->id, $client)) {
            if (Business::CanUpdateClient(Auth::user()->id)) {
                return redirect(route('BusinessEditClient',$user->reg_no));
            } else session()->flash('error', 'You are not Allowed to perform this action!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Delete($client)
    {
        if ($user = Business::CheckClient(Auth::user()->id, $client)) {
            if (Business::CanDeleteClient(Auth::user()->id)) {
                $user->forceDelete();
                session()->flash('success', 'Deleted Successfully!');
            } else session()->flash('error', 'You are not Allowed to perform this action!');
        } else session()->flash('error', 'Something went wrong!');
    }
}
