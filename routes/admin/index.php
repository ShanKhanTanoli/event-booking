<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard\Index as AdminDashboard;

/*Begin::Business*/
use App\Http\Livewire\Admin\Dashboard\Business\Index as ViewAllBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\Add\Index as AddBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\Edit\Index as EditBusiness;
use App\Http\Livewire\Admin\Dashboard\Business\UpdatePassword\Index as UpdateBusinessPassword;
/*End::Business*/

/*Begin::Business Mails*/
use App\Http\Livewire\Admin\Dashboard\Business\Mails\Index as ViewBusinessMails;
use App\Http\Livewire\Admin\Dashboard\Business\Mails\Send\Index as SendMailToBusiness;
/*End::Business Mails*/

/*Begin::Clients*/
use App\Http\Livewire\Admin\Dashboard\Clients\Index as ViewAllClients;
use App\Http\Livewire\Admin\Dashboard\Clients\Add\Index as AddClient;
use App\Http\Livewire\Admin\Dashboard\Clients\Edit\Index as EditClient;
use App\Http\Livewire\Admin\Dashboard\Clients\UpdatePassword\Index as UpdateClientPassword;
/*End::Clients*/

/*Begin::Clients Mails*/
use App\Http\Livewire\Admin\Dashboard\Clients\Mails\Index as ViewClientMails;
use App\Http\Livewire\Admin\Dashboard\Clients\Mails\Send\Index as SendMailToClient;
/*End::Clients Mails*/

/*Begin::Events*/
use App\Http\Livewire\Admin\Dashboard\Events\Index as AllEvents;
use App\Http\Livewire\Admin\Dashboard\Events\View\Index as ViewEvent;
use App\Http\Livewire\Admin\Dashboard\Events\Add\Index as AddEvent;
use App\Http\Livewire\Admin\Dashboard\Events\Edit\Index as EditEvent;
/*End::Events*/

/*Begin::Payments*/
use App\Http\Livewire\Admin\Dashboard\Payments\Index as ViewAllPayments;
/*End::Payments*/

/*Begin::Settings*/
use App\Http\Livewire\Admin\Dashboard\Settings\Index as Settings;
use App\Http\Livewire\Admin\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Index as Currency;
use App\Http\Livewire\Admin\Dashboard\Settings\Languages\Index as Language;
use App\Http\Livewire\Admin\Dashboard\Settings\Currencies\Edit\Index as EditCurrency;
use App\Http\Livewire\Admin\Dashboard\Settings\Stripe\Index as Stripe;
use App\Http\Livewire\Admin\Dashboard\Settings\Stripe\Edit\Index as EditStripe;
use App\Http\Livewire\Admin\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,Admin Group*/

Route::middleware(['auth', 'admin'])->prefix('Admin')->group(function () {

    Route::get('Dashboard/{lang}', AdminDashboard::class)
        ->name('AdminDashboard');

    /*Begin::Business*/
    Route::get('Business', ViewAllBusiness::class)->name('AdminBusiness');

    Route::get('AddBusiness', AddBusiness::class)->name('AdminAddBusiness');

    Route::get('EditBusiness/{slug}', EditBusiness::class)->name('AdminEditBusiness');

    Route::get('UpdateBusiness/{slug}/Password', UpdateBusinessPassword::class)
        ->name('AdminUpdateBusinessPassword');
    /*End::Business*/

    /*Begin::BusinessMails*/
    Route::get('BusinessMails/{slug}', ViewBusinessMails::class)
        ->name('AdminBusinessMails');
    Route::get('SendMail/{slug}', SendMailToBusiness::class)
        ->name('AdminSendMailToBusiness');
    /*End::BusinessMails*/

    /*Begin::Events*/
    Route::get('Events', AllEvents::class)->name('AdminEvents');
    Route::get('ViewEvent/{slug}', ViewEvent::class)->name('AdminViewEvent');
    Route::get('AddEvent', AddEvent::class)->name('AdminAddEvent');
    Route::get('EditEvent/{slug}', EditEvent::class)->name('AdminEditEvent');
    /*End::Events*/

    /*Begin::Clients*/
    Route::get('Clients', ViewAllClients::class)->name('AdminClients');

    Route::get('AddClient', AddClient::class)->name('AdminAddClient');

    Route::get('EditClient/{slug}', EditClient::class)->name('AdminEditClient');

    Route::get('UpdateClient/{slug}/Password', UpdateClientPassword::class)
        ->name('AdminUpdateClientPassword');
    /*End::Clients*/

    /*Begin::ClientMails*/
    Route::get('ClientMails/{slug}', ViewClientMails::class)
        ->name('AdminClientMails');

    Route::get('SendMail/{slug}', SendMailToClient::class)
        ->name('AdminSendMailToClient');
    /*End::ClientMails*/

    /*Begin::Payments*/
    Route::get('Payments', ViewAllPayments::class)->name('AdminPayments');
    /*End::Payments*/

    /*Begin::Settings*/
    Route::get('Settings/General', Settings::class)->name('AdminSettings');

    Route::get('Settings/Profile', EditProfile::class)->name('AdminEditProfile');

    Route::get('Settings/Currency', Currency::class)->name('AdminCurrency');

    Route::get('Settings/EditCurrency/{slug}', EditCurrency::class)
        ->name('AdminEditCurrency');

    Route::get('Settings/Language', Language::class)->name('AdminLanguage');

    Route::get('Settings/Stripe', Stripe::class)->name('AdminStripe');

    Route::get('Settings/EditStripe', EditStripe::class)
        ->name('AdminEditStripe');

    Route::get('Settings/Password', EditPassword::class)->name('AdminEditPassword');
    /*End::Settings*/
});
/*End::Auth,Admin Group*/
