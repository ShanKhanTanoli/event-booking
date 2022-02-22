<?php

namespace App\Http\Livewire\Dashboard\Admin\Business;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Validator;

class Businessdetails extends Component
{
    public $business;

    public $state = [];

    public function mount()
    {
        $this->state = $this->business->only([
            'business_avatar',
            'business_name',
            'business_user_name',
            'business_bio',
            'business_address',
            'business_phone',
            'business_email',
            'email_verified_at',
            'role',
            'created_at'
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.business.businessdetails');
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'business_name' => 'required|string',
            'business_user_name' => 'required|string|unique:users,business_user_name,' . $this->business->id,
            'business_bio' => 'required|string',
            'business_address' => 'required|string',
            'business_phone' => 'required|numeric|unique:users,business_phone,' . $this->business->id,
            'business_email' => 'required|email|unique:users,business_email,' . $this->business->id,
        ])->validate();
        if($user = Admin::CheckBusiness($this->business->id)){
            $user->update($validated);
            session()->flash('success', 'Updated Successfully');
        }else session()->flash('error','Something went wrong!');
    }


    /*Unverify Email*/
    public function UnVerifyEmail($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->update(['email_verified_at' => null]);
            session()->flash('error', 'Email has been Unverified & Business owner needs to verify this Email');
        } else session()->flash('error', 'Something went wrong!');
    }

    /*Verify Email*/
    public function VerifyEmail($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->update(['email_verified_at' => now()]);
            session()->flash('success', 'Email has been Verified Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }

    /*Begin::Activate & Ban a Business*/
    public function BanNow($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->delete();
            session()->flash('error', 'Business has been Banned Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function ActivateNow($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->restore();
            session()->flash('success', 'Business has been Activated Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }
    /*End::Activate & Ban a Business*/
}
