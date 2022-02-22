<?php

namespace App\Http\Livewire\Dashboard\Admin\Clients;

use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class Update extends Component
{
    use WithFileUploads;
    
    public $client;

    public $state = [];

    public $avatar;

    public function mount()
    {
        $this->state = $this->client->only(['avatar', 'name', 'user_name', 'bio', 'address', 'phone', 'email', 'email_verified_at', 'role', 'created_at']);
    }

    public function render()
    {
        return view('livewire.dashboard.admin.clients.update');
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
        ])->validate();

        if($user = Admin::CheckClient($this->client->id)){
            $user->update($validated);
            session()->flash('success', 'Updated Successfully');
        }else session()->flash('error','Something went wrong!');
    }

    public function UnVerifyEmail($client)
    {
        if($user = Admin::CheckClient($client)){
            $user->update(['email_verified_at' => null]);
            session()->flash('error','Email has been Unverified & Client needs to verify this Email');
        }else session()->flash('error','Something went wrong!');
    }

    public function VerifyEmail($client)
    {
        if($user = Admin::CheckClient($client)){
            //dd($user);
            $user->update(['email_verified_at' => now()]);
            session()->flash('success','Email has been Verified Successfully!');
        }else session()->flash('error','Something went wrong!');
    }

    /*Begin::Activate & Ban a Client*/
    public function BanNow($client)
    {
        if($user = Admin::CheckClient($client)){
            $user->delete();
            session()->flash('error','Client has been Banned Successfully!');
        }else session()->flash('error','Something went wrong!');
    }

    public function ActivateNow($client)
    {
        if($user = Admin::CheckClient($client)){
            $user->restore();
            session()->flash('success','Client has been Activated Successfully!');
        }else session()->flash('error','Something went wrong!');
    }
    /*End::Activate & Ban a Client*/

    /*Begin::Upload & Remove Image*/
    public function Upload($client)
    {
        if($user = Admin::CheckClient($client)){
            $this->validate([
                'business_avatar' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'avatar' . '-' . time() . '-' . mt_rand(999, 9999999999) . '.' . $this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('/', $imageName, ['disk' => 'BusinessImages']);
            $client->update(['avatar' => $imageName]);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove($client)
    {
        if($user = Admin::CheckClient($client)){
            $client->update(['avatar' => null]);
            $this->avatar = null;
            session()->flash('success', 'Removed Successfully');
        } else session()->flash('error', 'Something went wrong!');
    }
    /*End::Upload & Remove Image*/

}
