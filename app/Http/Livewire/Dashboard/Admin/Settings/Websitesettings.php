<?php

namespace App\Http\Livewire\Dashboard\Admin\Settings;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\Admin\Admin;

class Websitesettings extends Component
{
    use WithFileUploads;


    public $text_logo;
    public $logo;
    public $commission_percentage;

    public $currency;

    public function mount()
    {
        if ($stripe = Admin::Settings()) {
            $this->text_logo = $stripe->text_logo;
            $this->commission_percentage = $stripe->commission_percentage;
            $this->currency = $stripe->currency;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.admin.settings.websitesettings');
    }

    public function Update()
    {
        if ($settings = Admin::Settings()) {
            $validated = $this->validate([
                'text_logo' => 'required|string',
                'commission_percentage' => 'required|numeric',
                'currency' => 'required|string|in:usd,eur,aud,cad,gbp',
            ]);
            $settings->update($validated);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Upload()
    {
        if ($settings = Admin::Settings()) {
            $this->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,bmp|max:1024',
            ]);
            $imageName = 'logo'.'-'.time().'-'.mt_rand(999,9999999999). '.' . $this->logo->getClientOriginalExtension();
            $this->logo->storeAs('/', $imageName, ['disk' => 'AdminLogos']);
            $settings->update(['logo' => $imageName]);
            session()->flash('success', 'Successfully Updated');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Remove()
    {
        if ($settings = Admin::Settings()) {
            $settings->update(['logo' => null]);
            $this->logo = null;
            session()->flash('success', 'Removed Successfully');
        } else session()->flash('error', 'Something went wrong!');
    }
}
