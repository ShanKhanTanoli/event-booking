<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Business\Dashboard\Index as BusinessDashboard;

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

/*Begin::Settings*/
use App\Http\Livewire\Business\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Business\Dashboard\Settings\Store\Index as EditStore;
use App\Http\Livewire\Business\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Auth,Business Group*/

Route::middleware(['auth', 'business'])->prefix('Business')->group(function () {

    Route::get('Dashboard', BusinessDashboard::class)->name('BusinessDashboard');

    /*Begin::Events*/
    Route::get('Events', Events::class)
        ->name('BusinessEvents');

    Route::get('ViewEvent/{slug}', ViewEvent::class)
        ->name('BusinessViewEvent');

    Route::get('AddEvent', AddEvent::class)
        ->name('BusinessAddEvent');

    Route::get('EditEvent/{slug}', EditEvent::class)
        ->name('BusinessEditEvent');
    /*End::Events*/

    /*Begin::Payments*/
    Route::get('Payments', Payments::class)->name('BusinessPayments');
    Route::get('AddPayment', AddPayment::class)->name('BusinessAddPayment');
    Route::get('EditPayment/{id}', EditPayment::class)->name('BusinessEditPayment');
    /*End::Payments*/

    /*Begin::StripeConnect*/
    Route::get('StripeConnect', StripeConnect::class)->name('BusinessStripeConnect');
    /*End::StripeConnect*/

    /*Begin::Settings*/
    Route::get('Settings/Profile', EditProfile::class)->name('BusinessEditProfile');
    Route::get('Settings/Store', EditStore::class)->name('BusinessEditStore');
    Route::get('Settings/Password', EditPassword::class)->name('BusinessEditPassword');
    /*End::Settings*/
});
/*End::Auth,Business Group*/
