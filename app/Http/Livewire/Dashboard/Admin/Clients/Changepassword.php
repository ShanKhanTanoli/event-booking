<?php

namespace App\Http\Livewire\Dashboard\Admin\Clients;

use Exception;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Changepassword extends Component
{
    public $client;

    public $state = [];

    public $avatar;

    public function render()
    {
        return view('livewire.dashboard.admin.clients.changepassword');
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ])->validate();

        if (Admin::Is(Auth::user()->id)) {
            try{
                $this->client->update(['password' => Hash::make($validated['password'])]);
                $this->reset(['state']);
                session()->flash('success', 'Password Updated Successfully');
            }catch(Exception $e){
                session()->flash('success', $e->getMessage());
            }
        } else return session()->flash('error', 'Something went wrong!');
    }

    /*Unverify Email*/
    public function UnVerifyEmail($client)
    {
        if($user = Admin::CheckClient($client)){
            $user->update(['email_verified_at' => null]);
            session()->flash('error','Email has been Unverified & Client needs to verify this Email');
        }else session()->flash('error','Something went wrong!');
    }

    /*Verify Email*/
    public function VerifyEmail($client)
    {
        if($user = Admin::CheckClient($client)){
            $user->update(['email_verified_at' => now()]);
            session()->flash('success','Email has been Verified Successfully!');
        }else session()->flash('error','Something went wrong!');
    }

        /*Begin::Activate & Ban a Client*/
        public function BanNow($client)
        {
            if($user = Admin::CheckClient($client)){
                $user->delete();
                session()->flash('error','Client has been Banned Successfully!');
            }else session()->flash('error','Something went wrong!');
        }
    
        public function ActivateNow($client)
        {
            if($user = Admin::CheckClient($client)){
                $user->restore();
                session()->flash('success','Client has been Activated Successfully!');
            }else session()->flash('error','Something went wrong!');
        }
        /*End::Activate & Ban a Client*/
}
