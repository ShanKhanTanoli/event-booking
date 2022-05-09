<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Client\Dashboard\Index as ClientDashboard;


/*Begin::Events*/
use App\Http\Livewire\Client\Dashboard\Events\Index as Events;
use App\Http\Livewire\Client\Dashboard\Events\View\Index as ViewEvent;
use App\Http\Livewire\Client\Dashboard\Events\Book\Index as BookEvent;
/*End::Events*/

/*Begin::Settings*/
use App\Http\Livewire\Client\Dashboard\Settings\Profile\Index as EditProfile;
use App\Http\Livewire\Client\Dashboard\Settings\Password\Index as EditPassword;
/*End::Settings*/

/*Begin::Payments*/
use App\Http\Livewire\Client\Dashboard\Payments\Index as Payments;
/*End::Payments*/

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

    /*Begin::Payments*/
    Route::get('Payments/{lang?}', Payments::class)->name('ClientPayments');
    /*End::Payments*/

    /*Begin::Settings*/
    Route::get('Settings/Profile/{lang?}', EditProfile::class)->name('ClientEditProfile');
    Route::get('Settings/Password/{lang?}', EditPassword::class)->name('ClientEditPassword');
    /*End::Settings*/
});
/*End::Auth,Client Group*/
