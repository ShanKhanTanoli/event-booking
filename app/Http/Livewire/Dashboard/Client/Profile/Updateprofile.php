<?php

namespace App\Http\Livewire\Dashboard\Client\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Updateprofile extends Component
{
    public $state = [];

    public $avatar;

    use WithFileUploads;

    public function mount()
    {
        $this->state = auth()->user()
            ->only([
                'avatar',
                'name',
                'bio',
                'address',
                'phone',
                'email',
                'email_verified_at',
                'role',
                'created_at'
            ]);
    }

    public function render()
    {
        return view('livewire.dashboard.client.profile.updateprofile');
    }

    public function Update()
    {
        if ($user = Client::Is(Auth::user()->id)) {
            $validated = Validator::make($this->state, [
                'name' => 'required|string',
                'bio' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|numeric|unique:users,phone,' . auth()->user()->id,
                'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            ])->validate();
            $user->update($validated);
            session()->flash('success', 'Successfully Updated');
            return redirect(route('ClientProfile'));
        } else session()->flash('error', 'Something went wrong');
    }

    public function Upload()
    {
        if ($business = Client::Is(Auth::user()->id)) {
            $this->validate([
                'avatar' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'avatar' . '-' . time() . '-' . mt_rand(999, 9999999999) . '.' . $this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('/', $imageName, ['disk' => 'ClientAvatars']);
            $business->update(['avatar' => $imageName]);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove()
    {
        if ($business = Client::Is(Auth::user()->id)) {
            $business->update(['avatar' => null]);
            $this->avatar = null;
            session()->flash('success', 'Removed Successfully');
        } else session()->flash('error', 'Something went wrong!');
    }
}
