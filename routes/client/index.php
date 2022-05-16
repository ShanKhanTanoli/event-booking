<?php

use Illuminate\Support\Facades\Route;

/*Begin::Client Dashboard*/
use App\Http\Livewire\Client\Dashboard\Index as ClientDashboard;
/*End::Client Dashboard*/

/*Begin::Business Plans*/
use App\Http\Livewire\Client\Dashboard\BusinessPlans\Index as BusinessPlans;
/*End::Business Plans*/

/*Begin::Subscribe*/
use App\Http\Livewire\Client\Dashboard\Subscribe\Index as Subscribe;
/*End::Subscribe*/

/*Begin::Events*/
use App\Http\Livewire\Client\Dashboard\Events\Index as Events;
use App\Http\Livewire\Client\Dashboard\Events\View\Index as ViewEvent;
use App\Http\Livewire\Client\Dashboard\Events\Book\Index as BookEvent;
/*End::Events*/

/*Begin::Subscriptions*/
use App\Http\Livewire\Client\Dashboard\Subscriptions\Index as Subscriptions;
/*End::Subscriptions*/

/*Begin::Settings*/
use App\Http\Livewire\Client\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Client\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/


/*Begin::Auth,Client Group*/

Route::middleware(['auth', 'client'])->prefix('Client')->group(function () {

    Route::get('Dashboard/{lang?}', ClientDashboard::class)->name('ClientDashboard');

    /*Begin::Events*/
    Route::get('Events/{lang?}', Events::class)
        ->name('ClientEvents');

    Route::get('ViewEvent/{slug}/{lang?}', ViewEvent::class)
        ->name('ClientViewEvent');

    Route::get('BookEvent/{slug}/{lang?}', BookEvent::class)
        ->name('ClientBookEvent');
    /*End::Events*/

    /*Begin::BusinessPlans*/
    Route::get('BusinessPlans/{lang?}', BusinessPlans::class)
        ->name('ClientBusinessPlans');
    /*End::BusinessPlans*/

    /*Begin::Subscribe*/
    Route::get('Subscribe/{slug}/{lang?}', Subscribe::class)
        ->name('ClientSubscribe');
    /*End::Subscribe*/

    /*Begin::Subscriptions*/
    Route::get('Subscriptions/{lang?}', Subscriptions::class)->name('ClientSubscriptions');
    /*End::Subscriptions*/

    /*Begin::Settings*/
    Route::get('Settings/Profile/{lang?}', EditProfile::class)->name('ClientEditProfile');
    Route::get('Settings/Password/{lang?}', EditPassword::class)->name('ClientEditPassword');
    /*End::Settings*/
});
/*End::Auth,Client Group*/
