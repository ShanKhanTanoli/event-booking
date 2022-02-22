<?php

namespace App\Http\Livewire\Dashboard\Business\Settings;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;

class Update extends Component
{
    use WithFileUploads;


    public $text_logo;
    public $logo;



    public function mount()
    {
        if ($stripe = Business::Settings(Auth::user()->id)) {
            $this->text_logo = $stripe->text_logo;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.business.settings.update');
    }

    public function Update()
    {
        if ($stripe = Business::Settings(Auth::user()->id)) {
            $validated = $this->validate([
                'text_logo' => 'required|string',
            ]);
            $stripe->update($validated);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Upload()
    {
        if ($stripe = Business::Settings(Auth::user()->id)) {
            $validated = $this->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'logo'.'-'.time().'-'.mt_rand(999,9999999999). '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('/', $imageName, ['disk' => 'BusinessLogos']);
            $stripe->update(['logo' => $imageName]);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove()
    {
        if ($stripe = Business::Settings(Auth::user()->id)) {
            $stripe->update(['logo' => null]);
            $this->logo = null;
            session()->flash('success', 'Removed Successfully');
        } else session()->flash('error', 'Something went wrong!');
    }
}
