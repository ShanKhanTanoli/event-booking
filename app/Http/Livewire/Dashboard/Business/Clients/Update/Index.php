<?php

namespace App\Http\Livewire\Dashboard\Business\Clients\Update;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{

    public $client;

    public $avatar;

    use WithFileUploads;

    public $state = [];

    public function mount()
    {
        $this->state = $this->client->only([
            'avatar',
            'name',
            'user_name',
            'bio',
            'address',
            'phone',
            'email',
            'role',
            'created_at'
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.business.clients.update.index');
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string',
            'user_name' => 'required|string|unique:users,user_name,' . $this->client->id,
            'bio' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric|unique:users,phone,' . $this->client->id,
            'email' => 'required|email|unique:users,email,' . $this->client->id,
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
        ])->validate();

        if ($user = Business::CheckClient(Auth::user()->id, $this->client->id)) {
            if (Business::CanUpdateClient(Auth::user()->id)) {
                if (isset($validated['password'])) {
                    $data = [
                        'password' => Hash::make($validated['password']),
                    ];
                } else {
                    $data = [
                        'password' => $user->password,
                    ];
                }
                $user->update(array_merge($validated, $data));
                session()->flash('success', 'Updated Successfully');
                return redirect(route('BusinessEditClient', $user->reg_no));
            } else session()->flash('error', 'You are not Allowed to perform this action!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function UnVerifyEmail($client)
    {
        if ($user = Business::ClientIsVerified(Auth::user()->id, $client)) {
            if (Business::CanVerifyClient(Auth::user()->id)) {
                $user->update(['email_verified_at' => null]);
                session()->flash('error', 'Email has been Unverified & Client needs to verify this Email');
            } else session()->flash('error', 'You are not Allowed to perform this action!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function VerifyEmail($client)
    {
        if ($user = Business::CheckClient(Auth::user()->id, $client)) {
            if (Business::CanVerifyClient(Auth::user()->id)) {
                $user->update(['email_verified_at' => now()]);
                session()->flash('success', 'Email has been Verified Successfully!');
            } else session()->flash('error', 'You are not Allowed to perform this action!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Upload()
    {
        if ($user = Business::CheckClient(Auth::user()->id, $this->client->id)) {
            $this->validate([
                'avatar' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'avatar' . '-' . time() . '-' . mt_rand(999, 9999999999) . '.' . $this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('/', $imageName, ['disk' => 'ClientAvatars']);
            $user->update(['avatar' => $imageName]);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove()
    {
        if ($user = Business::CheckClient(Auth::user()->id, $this->client->id)) {
            $user->update(['avatar' => null]);
            $this->avatar = null;
            session()->flash('success', 'Removed Successfully');
        } else session()->flash('error', 'Something went wrong!');
    }
}
