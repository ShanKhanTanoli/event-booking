<?php

namespace App\Http\Livewire\Dashboard\Business\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Update extends Component
{
    public $state = [];

    public $avatar;

    use WithFileUploads;

    public function mount()
    {
        $this->state = Auth::user()->only(
            [
                'avatar',
                'name',
                'user_name',
                'bio',
                'address',
                'phone',
                'email',
                'role',
                'created_at',
            ]
        );
    }

    public function render()
    {
        return view('livewire.dashboard.business.profile.update');
    }

    public function Update()
    {
        if ($user = Business::Is(Auth::user()->id)) {
            $validated = Validator::make($this->state, [
                'name' => 'required|string',
                'user_name' => 'required|string|unique:users,user_name,' . Auth::user()->id,
                'bio' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|numeric|unique:users,phone,' . Auth::user()->id,
                'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            ])->validate();
            $user->update($validated);
            session()->flash('success', 'Successfully Updated');
            return redirect(route('BusinessProfile'));
        } else session()->flash('error', 'Something went wrong');
    }

    public function Upload()
    {
        if ($business = Business::Is(Auth::user()->id)) {
            $this->validate([
                'avatar' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'avatar' . '-' . time() . '-' . mt_rand(999, 9999999999) . '.' . $this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('/', $imageName, ['disk' => 'BusinessAvatars']);
            $business->update(['avatar' => $imageName]);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove()
    {
        if ($business = Business::Is(Auth::user()->id)) {
            $business->update(['avatar' => null]);
            $this->avatar = null;
            session()->flash('success', 'Removed Successfully');
        } else session()->flash('error', 'Something went wrong!');
    }
}
