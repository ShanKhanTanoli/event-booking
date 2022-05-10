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

    Route::get('Dashboard/{lang?}', AdminDashboard::class)
        ->name('AdminDashboard');

    /*Begin::Business*/
    Route::get('Business/{lang?}', ViewAllBusiness::class)
        ->name('AdminBusiness');

    Route::get('AddBusiness/{lang?}', AddBusiness::class)
        ->name('AdminAddBusiness');

    Route::get('EditBusiness/{slug}/{lang?}', EditBusiness::class)
        ->name('AdminEditBusiness');

    Route::get('UpdateBusiness/{slug}/Password/{lang?}', UpdateBusinessPassword::class)
        ->name('AdminUpdateBusinessPassword');
    /*End::Business*/

    /*Begin::BusinessMails*/
    Route::get('BusinessMails/{slug}/{lang?}', ViewBusinessMails::class)
        ->name('AdminBusinessMails');
    Route::get('SendMail/{slug}/{lang?}', SendMailToBusiness::class)
        ->name('AdminSendMailToBusiness');
    /*End::BusinessMails*/

    /*Begin::Events*/
    Route::get('Events/{lang?}', AllEvents::class)
        ->name('AdminEvents');

    Route::get('ViewEvent/{slug}/{lang?}', ViewEvent::class)
        ->name('AdminViewEvent');

    Route::get('AddEvent/{lang?}', AddEvent::class)
        ->name('AdminAddEvent');

    Route::get('EditEvent/{slug}/{lang?}', EditEvent::class)
        ->name('AdminEditEvent');
    /*End::Events*/

    /*Begin::Clients*/
    Route::get('Clients/{lang?}', ViewAllClients::class)
        ->name('AdminClients');

    Route::get('AddClient/{lang?}', AddClient::class)
        ->name('AdminAddClient');

    Route::get('EditClient/{slug}/{lang?}', EditClient::class)
        ->name('AdminEditClient');

    Route::get('UpdateClient/{slug}/Password/{lang?}', UpdateClientPassword::class)
        ->name('AdminUpdateClientPassword');
    /*End::Clients*/

    /*Begin::ClientMails*/
    Route::get('ClientMails/{slug}/{lang?}', ViewClientMails::class)
        ->name('AdminClientMails');

    Route::get('SendMail/{slug}/{lang?}', SendMailToClient::class)
        ->name('AdminSendMailToClient');
    /*End::ClientMails*/

    /*Begin::Payments*/
    Route::get('Payments/{lang?}', ViewAllPayments::class)
        ->name('AdminPayments');
    /*End::Payments*/

    /*Begin::Settings*/
    Route::get('Settings/General/{lang?}', Settings::class)
        ->name('AdminSettings');

    Route::get('Settings/Profile/{lang?}', EditProfile::class)
        ->name('AdminEditProfile');

    Route::get('Settings/Currency/{lang?}', Currency::class)
        ->name('AdminCurrency');

    Route::get('Settings/EditCurrency/{slug}/{lang?}', EditCurrency::class)
        ->name('AdminEditCurrency');

    Route::get('Settings/Language/{lang?}', Language::class)
        ->name('AdminLanguage');

    Route::get('Settings/Stripe/{lang?}', Stripe::class)
        ->name('AdminStripe');

    Route::get('Settings/EditStripe/{lang?}', EditStripe::class)
        ->name('AdminEditStripe');

    Route::get('Settings/Password/{lang?}', EditPassword::class)
        ->name('AdminEditPassword');
    /*End::Settings*/
});
/*End::Auth,Admin Group*/
