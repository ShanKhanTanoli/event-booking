<?php

namespace App\Http\Livewire\Dashboard\Admin\Business;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use App\Models\BusinessAbility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Add extends Component
{
    public $state = [];

    public function mount()
    {
        $this->state = [
            'role' => 'business',
            'role_id' => '2',
        ];
    }
    public function render()
    {
        return view('livewire.dashboard.admin.business.add');
    }

    public function AddBusinessAccount()
    {
        $validated = Validator::make($this->state, [
            'name' => 'required|string',
            'user_name' => 'required|string|unique:users',
            'bio' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
            'role' => 'required|in:business',
            'role_id' => 'required|in:2',
        ])->validate();

        if(Admin::Is(Auth::user()->id)){
            $business = User::create($validated);
            BusinessAbility::create([
                'user_id' => $business->id,
                
                'can_view_reservation' => 0,
                'can_create_reservation' => 0,
                'can_update_reservation' => 0,
                'can_delete_reservation' => 0,

                'can_view_client' => 0,
                'can_create_client' => 0,
                'can_update_client' => 0,
                'can_delete_client' => 0,
                'can_verify_client' => 0,

            ]);
            session()->flash('success', 'Business Account Created Successfully.Now You can give Permissions & Abilities to this Account');
            return redirect(route('AdminEditBusiness',$business->user_name));
        }else session()->flash('error','Something went wrong!');
    }
}
