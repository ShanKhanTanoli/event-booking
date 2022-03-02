<?php

namespace App\Http\Livewire\Dashboard\Business\Clients\Create;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Index extends Component
{
    public $state = [];

    public function render()
    {
        return view('livewire.dashboard.business.clients.create.index');
    }

    public function Create()
    {
        if ($user = Business::Is(Auth::user()->id)) {
            if (Business::CanCreateReservation(Auth::user()->id)) {
                $validated = Validator::make($this->state, [
                    'name' => 'required|string',
                    'user_name' => 'required|string|unique:users,user_name',
                    'bio' => 'required|string',
                    'address' => 'required|string',
                    'phone' => 'required|numeric|unique:users',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|string|min:8|confirmed',
                    'password_confirmation' => 'required|string|min:8',
                ])->validate();
                $data = [
                    'name' => $validated['name'],
                    'reg_no' => strtoupper(Str::random()),
                    'bio' => $validated['bio'],
                    'address' => $validated['address'],
                    'phone' => $validated['phone'],
                    'email' => $validated['email'],
                    'password' => bcrypt($validated['password']),
                    'role' => 'client',
                    'role_id' => 3,
                    'created_by' => $user->id,
                ];
                User::create($data);
                session()->flash('success', 'Created Successfully');
                return redirect(route('BusinessClients'));
            } else session()->flash('error', 'You are not allowed to create the client!');
        } else session()->flash('error', 'Something went wrong');
    }
}
