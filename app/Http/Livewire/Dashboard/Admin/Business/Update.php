<?php

namespace App\Http\Livewire\Dashboard\Admin\Business;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class Update extends Component
{
    public $business;

    public $state = [];

    public $avatar;

    use WithFileUploads;

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
        if ($user = Admin::CheckBusiness($this->business->id)) {
            $user->update($validated);
            session()->flash('success', 'Updated Successfully');
            return redirect(route('AdminEditBusiness', $this->business->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function UnVerifyEmail($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->update(['email_verified_at' => null]);
            session()->flash('error', 'Email has been Unverified & Business owner needs to verify this Email');
            return redirect(route('AdminEditBusiness', $this->business->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function VerifyEmail($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->update(['email_verified_at' => now()]);
            session()->flash('success', 'Email has been Verified Successfully!');
            return redirect(route('AdminEditBusiness', $this->business->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    /*Begin::Activate & Ban a Business*/
    public function BanNow($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->delete();
            session()->flash('error', 'Business has been Banned Successfully!');
            return redirect(route('AdminEditBusiness', $this->business->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function ActivateNow($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->restore();
            session()->flash('success', 'Business has been Activated Successfully!');
            return redirect(route('AdminEditBusiness', $this->business->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }
    /*End::Activate & Ban a Business*/

    /*Begin::Upload & Remove Image*/
    public function Upload()
    {
        if ($business = Admin::CheckBusiness($this->business->id)) {
            $this->validate([
                'avatar' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'avatar' . '-' . time() . '-' . mt_rand(9999, 999999999) . '.' . $this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('/', $imageName, ['disk' => 'BusinessAvatars']);
            $business->update(['avatar' => $imageName]);
            session()->flash('success', 'Successfully Updated');
            return redirect(route('AdminEditBusiness', $this->business->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove()
    {
        if ($business = Admin::CheckBusiness($this->business->id)) {
            $business->update(['avatar' => null]);
            $this->avatar = null;
            session()->flash('success', 'Removed Successfully');
            return redirect(route('AdminEditBusiness', $this->business->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }
    /*End::Upload & Remove Image*/
}
