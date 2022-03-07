<?php

namespace App\Http\Livewire\Dashboard\Admin\Clients;

use Livewire\Component;
use Illuminate\Support\Str;
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
            return redirect(route('AdminEditClient', $this->client->reg_no));
        }else session()->flash('error','Something went wrong!');
    }

    /*Begin::Upload & Remove Image*/
    public function Upload()
    {
        if($client = Admin::CheckClient($this->client->id)){
            $this->validate([
                'avatar' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'avatar' . '-' . time() . '-' .mt_rand(9999,999999999). '.' . $this->avatar->getClientOriginalExtension();
            $this->avatar->storeAs('/', $imageName, ['disk' => 'ClientAvatars']);
            $client->update(['avatar' => $imageName]);
            session()->flash('success', 'Successfully Updated');
            return redirect(route('AdminEditClient', $this->client->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove()
    {
        if($client = Admin::CheckClient($this->client->id)){
            $client->update(['avatar' => null]);
            $this->avatar = null;
            session()->flash('success', 'Removed Successfully');
            return redirect(route('AdminEditClient', $this->client->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }
    /*End::Upload & Remove Image*/

}
