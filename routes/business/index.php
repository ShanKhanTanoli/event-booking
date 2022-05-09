<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Business\Dashboard\Index as BusinessDashboard;

/*Begin::Clients*/
use App\Http\Livewire\Business\Dashboard\Clients\Index as Clients;
use App\Http\Livewire\Business\Dashboard\Clients\Add\Index as AddClient;
use App\Http\Livewire\Business\Dashboard\Clients\Edit\Index as EditClient;
use App\Http\Livewire\Business\Dashboard\Clients\UpdatePassword\Index as UpdateClientPassword;
/*End::Clients*/

/*Begin::Events*/
use App\Http\Livewire\Business\Dashboard\Events\Index as Events;
use App\Http\Livewire\Business\Dashboard\Events\View\Index as ViewEvent;
use App\Http\Livewire\Business\Dashboard\Events\Add\Index as AddEvent;
use App\Http\Livewire\Business\Dashboard\Events\Edit\Index as EditEvent;
/*End::Events*/

/*Begin::Payments*/
use App\Http\Livewire\Business\Dashboard\Payments\Index as Payments;
use App\Http\Livewire\Business\Dashboard\Payments\Add\Index as AddPayment;
use App\Http\Livewire\Business\Dashboard\Payments\Edit\Index as EditPayment;
/*End::Payments*/

/*Begin::StripeConnect*/
use App\Http\Livewire\Business\Dashboard\StripeConnect\Index as StripeConnect;
/*End::StripeConnect*/

/*Begin::BusinessDetails*/
use App\Http\Livewire\Business\Dashboard\BusinessDetails\Index as BusinessDetails;
/*End::BusinessDetails*/

/*Begin::Settings*/
use App\Http\Livewire\Business\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Business\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,Business Group*/

Route::middleware(['auth', 'business'])->prefix('Business')->group(function () {

    Route::get('Dashboard/{lang?}', BusinessDashboard::class)->name('BusinessDashboard');

    /*Begin::Clients*/
    Route::get('Clients/{lang?}', Clients::class)
        ->name('BusinessClients');

    Route::get('AddClient/{lang?}', AddClient::class)
        ->name('BusinessAddClient');

    Route::get('EditClient/{slug}/{lang?}', EditClient::class)
        ->name('BusinessEditClient');

    Route::get('UpdateClient/{slug}/Password/{lang?}', UpdateClientPassword::class)
        ->name('BusinessUpdateClientPassword');
    /*End::Clients*/

    /*Begin::Events*/
    Route::get('Events/{lang?}', Events::class)
        ->name('BusinessEvents');

    Route::get('ViewEvent/{slug}/{lang?}', ViewEvent::class)
        ->name('BusinessViewEvent');

    Route::get('AddEvent/{lang?}', AddEvent::class)
        ->name('BusinessAddEvent');

    Route::get('EditEvent/{slug}/{lang?}', EditEvent::class)
        ->name('BusinessEditEvent');
    /*End::Events*/

    /*Begin::BusinessDetails*/
    Route::get('BusinessDetails/{lang?}', BusinessDetails::class)->name('BusinessDetails');
    /*End::BusinessDetails*/

    /*Begin::Payments*/
    Route::get('Payments/{lang?}', Payments::class)->name('BusinessPayments');
    Route::get('AddPayment/{lang?}', AddPayment::class)->name('BusinessAddPayment');
    Route::get('EditPayment/{id}/{lang?}', EditPayment::class)->name('BusinessEditPayment');
    /*End::Payments*/

    /*Begin::StripeConnect*/
    Route::get('StripeConnect/{lang?}', StripeConnect::class)->name('BusinessStripeConnect');
    /*End::StripeConnect*/


    /*Begin::Settings*/
    Route::get('Settings/Profile/{lang?}', EditProfile::class)->name('BusinessEditProfile');
    Route::get('Settings/Password/{lang?}', EditPassword::class)->name('BusinessEditPassword');
    /*End::Settings*/
});
/*End::Auth,Business Group*/
