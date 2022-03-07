<?php

namespace App\Http\Livewire\Dashboard\Admin\Business;

use Exception;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Changepassword extends Component
{
    public $business;

    public $state = [];

    public $avatar;

    public function render()
    {
        return view('livewire.dashboard.admin.business.changepassword');
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
        ])->validate();

        if (Admin::Is(Auth::user()->id)) {
            try{
                $this->business->update(['password' => Hash::make($validated['password'])]);
                $this->reset(['state']);
                session()->flash('success', 'Password Updated Successfully');
                return redirect(route('AdminChangeBusinessPassword', $this->business->reg_no));
            }catch(Exception $e){
                session()->flash('success', $e->getMessage());
                return redirect(route('AdminChangeBusinessPassword', $this->business->reg_no));
            }
        } else return session()->flash('error', 'Something went wrong!');
    }

    /*Unverify Email*/
    public function UnVerifyEmail($business)
    {
        if($user = Admin::CheckBusiness($business)){
            $user->update(['email_verified_at' => null]);
            session()->flash('error','Email has been Unverified & Business owner needs to verify this Email');
            return redirect(route('AdminChangeBusinessPassword', $this->business->reg_no));
        }else session()->flash('error','Something went wrong!');
    }

    /*Verify Email*/
    public function VerifyEmail($business)
    {
        if($user = Admin::CheckBusiness($business)){
            $user->update(['email_verified_at' => now()]);
            session()->flash('success','Email has been Verified Successfully!');
            return redirect(route('AdminChangeBusinessPassword', $this->business->reg_no));
        }else session()->flash('error','Something went wrong!');
    }

        /*Begin::Activate & Ban a Business*/
        public function BanNow($business)
        {
            if($user = Admin::CheckBusiness($business)){
                $user->delete();
                session()->flash('error','Business has been Banned Successfully!');
                return redirect(route('AdminChangeBusinessPassword', $this->business->reg_no));
            }else session()->flash('error','Something went wrong!');
        }
    
        public function ActivateNow($business)
        {
            if($user = Admin::CheckBusiness($business)){
                $user->restore();
                session()->flash('success','Business has been Activated Successfully!');
                return redirect(route('AdminChangeBusinessPassword', $this->business->reg_no));
            }else session()->flash('error','Something went wrong!');
        }
        /*End::Activate & Ban a Business*/
}
