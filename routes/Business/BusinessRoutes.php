<?php

Route::prefix('Business')->middleware(['auth', 'business', 'verified'])->group(function () {

    /*Begin::Dashboard*/
    include('Dashboard.php');
    /*End::Dashboard*/

    /*Begin::Reservations*/
    include('Reservations.php');
    /*End::Reservations*/

    /*Begin::Clients*/
    include('Clients.php');
    /*End::Clients*/

    /*Begin::Pricing Plans*/
    include('PricingPlans.php');
    /*End::Pricing Plans*/

    /*Begin::Subscriptions*/
    include('Subscriptions.php');
    /*End::Subscriptions*/

    Route::get('Profile', [App\Http\Controllers\Business\BusinessController::class, 'Profile'])
        ->name('BusinessProfile');

    Route::get('Permissions', [App\Http\Controllers\Business\BusinessController::class, 'Permissions'])
        ->name('BusinessPermissions');

    Route::get('UpdatePassword', [App\Http\Controllers\Business\BusinessController::class, 'UpdatePassword'])
        ->name('BusinessUpdatePassword');

    Route::get('ConnectAccount', [App\Http\Controllers\Business\BusinessController::class, 'ConnectAccount'])
        ->name('BusinessConnectAccount');

    Route::get('Settings', [App\Http\Controllers\Business\BusinessController::class, 'Settings'])
        ->name('BusinessSettings');
});
