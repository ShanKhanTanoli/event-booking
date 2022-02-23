<?php

namespace App\Http\Livewire\Dashboard\Admin\Clients;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;

class Viewallclients extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $visibility = 'all';
    public $email_status = 'all';

    public function mount()
    {
        return User::where('role', 'client');
    }

    public function render()
    {
        $clients = $this->mount();

        if (!is_null($this->search)) {
            $clients = $clients->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
            $clients = $clients->where('role', 'client')
                ->withTrashed();
        }

        /*Begin::client Visibility*/
        if ($this->visibility == 'all') {
            $clients = $clients->where('role', 'client')
                ->withTrashed();
        }
        if ($this->visibility == 'banned') {
            $clients = $clients->where('role', 'client')
                ->onlyTrashed();
        }
        if ($this->visibility == 'banned') {
            $clients = $clients->where('role', 'client');
        }
        /*End::client Visibility*/

        /*Begin::client Email Status*/
        if ($this->email_status == 'all') {
            $clients = $clients->where('role', 'client')
                ->withTrashed();
        }
        if ($this->email_status == 'verified') {
            $clients = $clients->where('email_verified_at', '!=', null)
                ->withTrashed();
        }
        if ($this->email_status == 'unverified') {
            $clients = $clients->where('email_verified_at', null)
                ->withTrashed();
        }
        /*End::client Email Status*/

        $clients = $clients->paginate(6);
        return view('livewire.dashboard.admin.clients.viewallclients')
            ->with([
                'clients' => $clients,
            ]);
    }

    public function UnVerifyEmail($client)
    {
        if ($user = Admin::CheckClient($client)) {
            $user->update(['email_verified_at' => null]);
            session()->flash('error', 'Email has been Unverified & Client needs to verify this Email');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function VerifyEmail($client)
    {
        if ($user = Admin::CheckClient($client)) {
            $user->update(['email_verified_at' => now()]);
            session()->flash('success', 'Email has been Verified Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }

    /*Begin::Activate & Ban a Client*/
    public function BanNow($client)
    {
        if ($user = Admin::CheckClient($client)) {
            $user->delete();
            session()->flash('error', 'Client has been Banned Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function ActivateNow($client)
    {
        if ($user = Admin::CheckClient($client)) {
            $user->restore();
            session()->flash('success', 'Client has been Activated Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }
    /*End::Activate & Ban a Client*/

    public function EditNow($client)
    {
        if ($user = Admin::CheckClient($client)) {
            return redirect(route('AdminEditClient', $user->user_name));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function DeleteNow($client)
    {
        if ($user = Admin::CheckClient($client)) {
            $user->forceDelete();
            session()->flash('success', 'Client has been Deleted Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }
}
