<?php

namespace App\Http\Livewire\Dashboard\Admin\Business;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
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
            'bio' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric|unique:users,phone',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required|string',
            'role' => 'required|in:business',
            'role_id' => 'required|in:2',
        ])->validate();

        $reg_no = [
            'reg_no' => strtoupper(Str::random(30)),
        ];

        if (Admin::Is(Auth::user()->id)) {
            $business = User::create(array_merge($validated,$reg_no));

            BusinessAbility::create([
                'user_id' => $business->id,

                /*Begin::Reservation Actions*/
                'can_view_reservation' => 0,
                'can_create_reservation' => 0,
                'can_update_reservation' => 0,
                'can_delete_reservation' => 0,
                /*End::Reservation Actions*/

                /*Begin::Client Actions*/
                'can_view_client' => 0,
                'can_create_client' => 0,
                'can_update_client' => 0,
                'can_delete_client' => 0,
                'can_verify_client' => 0,
                'can_un_verify_client' => 0,
                /*End::Client Actions*/

                /*Begin::Client Actions*/
                'can_view_pricing_plan' => 0,
                'can_create_pricing_plan' => 0,
                'can_update_pricing_plan' => 0,
                /*End::Client Actions*/

            ]);
            session()->flash('success', 'Business Account Created Successfully.');
            return redirect(route('AdminEditBusiness', $business->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }
}
