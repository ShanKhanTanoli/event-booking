<?php

namespace App\Http\Livewire\Dashboard\Admin\Business;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Validator;

class Update extends Component
{
    public $business;

    public $state = [];

    public function mount()
    {
        $this->state = $this->business->only(['avatar', 'name', 'user_name', 'bio', 'address', 'phone', 'email', 'email_verified_at', 'role', 'created_at']);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.business.update');
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string',
            'user_name' => 'required|string|unique:users,user_name,' . $this->business->id,
            'bio' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric|unique:users,phone,' . $this->business->id,
            'email' => 'required|email|unique:users,email,' . $this->business->id,
        ])->validate();
        if($user = Admin::CheckBusiness($this->business->id)){
            $user->update($validated);
            session()->flash('success', 'Updated Successfully');
        }else session()->flash('error','Something went wrong!');
    }

    public function UnVerifyEmail($business)
    {
        if($user = Admin::CheckBusiness($business)){
            $user->update(['email_verified_at' => null]);
            session()->flash('error','Email has been Unverified & Business owner needs to verify this Email');
        }else session()->flash('error','Something went wrong!');
    }

    public function VerifyEmail($business)
    {
        if($user = Admin::CheckBusiness($business)){
            $user->update(['email_verified_at' => now()]);
            session()->flash('success','Email has been Verified Successfully!');
        }else session()->flash('error','Something went wrong!');
    }

    /*Begin::Activate & Ban a Business*/
    public function BanNow($business)
    {
        if($user = Admin::CheckBusiness($business)){
            $user->delete();
            session()->flash('error','Business has been Banned Successfully!');
        }else session()->flash('error','Something went wrong!');
    }

    public function ActivateNow($business)
    {
        if($user = Admin::CheckBusiness($business)){
            $user->restore();
            session()->flash('success','Business has been Activated Successfully!');
        }else session()->flash('error','Something went wrong!');
    }
    /*End::Activate & Ban a Business*/
}
