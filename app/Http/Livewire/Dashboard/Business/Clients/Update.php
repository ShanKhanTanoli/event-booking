<?php

namespace App\Http\Livewire\Dashboard\Business\Clients;

use Livewire\Component;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Update extends Component
{

    public $client;

    public $state = [];

    public function mount()
    {
        $this->state = $this->client->only(['avatar', 'name', 'bio', 'address', 'phone', 'email', 'email_verified_at', 'role', 'created_at']);
    }

    public function render()
    {
        return view('livewire.dashboard.business.clients.update');
    }

    public function Update()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string',
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
}
