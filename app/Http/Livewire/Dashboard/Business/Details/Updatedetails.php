<?php

namespace App\Http\Livewire\Dashboard\Business\Details;

use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class Updatedetails extends Component
{

    public $business_avatar;
    public $state = [];

    use WithFileUploads;

    public function mount()
    {
        $this->state = Auth::user()
            ->only([
                'business_avatar',
                'business_name',
                'business_user_name',
                'business_bio',
                'business_address',
                'business_phone',
                'business_email',
            ]);
    }

    public function render()
    {
        return view('livewire.dashboard.business.details.updatedetails');
    }

    public function Update()
    {
        if ($user = Business::Is(Auth::user()->id)) {
            $validated = Validator::make($this->state, [
                'business_name' => 'required|string',
                'business_user_name' => 'required|string|unique:users,business_user_name,' . Auth::user()->id,
                'business_bio' => 'required|string',
                'business_address' => 'required|string',
                'business_phone' => 'required|numeric|unique:users,business_phone,' . Auth::user()->id,
                'business_email' => 'required|email|unique:users,business_email,' . Auth::user()->id,
            ])->validate();
            $user->update($validated);
            session()->flash('success', 'Successfully Updated');
            return redirect(route('BusinessDetails'));
        } else session()->flash('error', 'Something went wrong');
    }

    public function Upload()
    {
        if ($business = Business::Is(Auth::user()->id)) {
            $this->validate([
                'business_avatar' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'business_avatar' . '-' . time() . '-' . mt_rand(999, 9999999999) . '.' . $this->business_avatar->getClientOriginalExtension();
            $this->business_avatar->storeAs('/', $imageName, ['disk' => 'BusinessImages']);
            $business->update(['business_avatar' => $imageName]);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove()
    {
        if ($business = Business::Is(Auth::user()->id)) {
            $business->update(['business_avatar' => null]);
            $this->business_avatar = null;
            session()->flash('success', 'Removed Successfully');
        } else session()->flash('error', 'Something went wrong!');
    }
}
