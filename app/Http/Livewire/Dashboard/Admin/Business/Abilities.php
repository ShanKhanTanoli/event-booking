<?php

namespace App\Http\Livewire\Dashboard\Admin\Business;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Illuminate\Support\Facades\Validator;

class Abilities extends Component
{
    public $business;

    public $state = [];

    public $avatar;

    public function mount()
    {
        $this->state = Admin::BusinessAbilities($this->business->id)->only([

            'can_un_verify_client',
            'can_verify_client',
            'can_delete_client',
            'can_update_client',
            'can_create_client',
            'can_view_client',

            'can_delete_reservation',
            'can_update_reservation',
            'can_create_reservation',
            'can_view_reservation',

            'can_update_pricing_plan',
            'can_create_pricing_plan',
            'can_view_pricing_plan',
        ]);
    }
    public function render()
    {
        return view('livewire.dashboard.admin.business.abilities');
    }


    public function Update()
    {
        $validated = Validator::make($this->state, [
            'can_un_verify_client' => 'boolean',
            'can_verify_client' => 'boolean',
            'can_delete_client' => 'boolean',
            'can_update_client' => 'boolean',
            'can_create_client' => 'boolean',
            'can_view_client' => 'boolean',


            'can_delete_reservation' => 'boolean',
            'can_update_reservation' => 'boolean',
            'can_create_reservation' => 'boolean',
            'can_view_reservation' => 'boolean',

            'can_delete_pricing_plan' => 'boolean',
            'can_update_pricing_plan' => 'boolean',
            'can_create_pricing_plan' => 'boolean',
            'can_view_pricing_plan' => 'boolean',

        ])->validate();
        if ($user = Admin::CheckBusiness($this->business->id)) {
            if ($abilities = Admin::BusinessAbilities($user->id)) {
                $abilities->update($validated);
                session()->flash('success', 'Updated Successfully');
                  return redirect(route('AdminEditBusinessAbilities', $user->reg_no));
            } else session()->flash('error', 'Something went wrong!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function UnVerifyEmail($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->update(['email_verified_at' => null]);
            session()->flash('error', 'Email has been Unverified & Business owner needs to verify this Email');
              return redirect(route('AdminEditBusinessAbilities', $user->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function VerifyEmail($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->update(['email_verified_at' => now()]);
            session()->flash('success', 'Email has been Verified Successfully!');
            return redirect(route('AdminEditBusinessAbilities', $user->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    /*Begin::Activate & Ban a Business*/
    public function BanNow($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->delete();
            session()->flash('error', 'Business has been Banned Successfully!');
              return redirect(route('AdminEditBusinessAbilities', $user->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function ActivateNow($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->restore();
            session()->flash('success', 'Business has been Activated Successfully!');
            return redirect(route('AdminEditBusinessAbilities', $user->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }
    /*End::Activate & Ban a Business*/
}
