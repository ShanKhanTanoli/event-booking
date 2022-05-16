<?php

namespace App\Http\Livewire\Client\Dashboard\Partials;

use Livewire\Component;
use App\Helpers\Client\Client;
use App\Helpers\Language\Language;
use App\Models\ClientSetting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class TopBar extends Component
{
    public $currentUrl, $currentRoute;

    public function mount()
    {
        $this->currentUrl = url()->current();
        $this->currentRoute = Route::currentRouteName();
    }

    public function render()
    {
        return view('livewire.client.dashboard.partials.top-bar');
    }

    public function ChangeLanguage($slug)
    {
        if ($language = Language::FindBySlug($slug)) {

            //If Settings are available
            if ($settings = Client::Settings(Auth::user()->id)) {

                $settings->update([
                    'language_id' => $language->id,
                ]);
            } else {

                ClientSetting::create([
                    'user_id' => Auth::user()->id,
                    'language_id' => $language->id,
                ]);
            }

            //Begin::If URL found
            if ($this->currentUrl) {

                App::setlocale($language->name);
                return redirect(route($this->currentRoute, App::getLocale()));
            } else {

                App::setlocale($language->name);
                return redirect(route('login', App::getLocale()));
            }
            //End::If URL found

        } else {

            App::setlocale('en');
            //Begin::If URL found
            if ($this->currentUrl) {
                return redirect($this->currentUrl);
            } else {
                return redirect(route('login', App::getLocale()));
            }
            //End::If URL found
        }
    }
}
