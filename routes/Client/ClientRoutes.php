<?php

Route::prefix('Client')->middleware(['auth', 'client', 'verified'])->group(function () {

    Route::get('Dashboard', [App\Http\Controllers\Client\ClientController::class, 'Dashboard'])
        ->name('ClientDashboard');

    /*Begin::PricingPlans*/
    include('PricingPlans.php');
    /*Begin::PricingPlans*/

    /*Begin::Reservations*/
    include('Reservations.php');
    /*Begin::Reservations*/

    /*Begin::Subscriptions*/
    include('Subscriptions.php');
    /*Begin::Subscriptions*/

    Route::get('Profile', [App\Http\Controllers\Client\ClientController::class, 'Profile'])
        ->name('ClientProfile');

    Route::get('JoinedBusiness', [App\Http\Controllers\Client\ClientController::class, 'JoinedBusiness'])
        ->name('ClientJoinedBusiness');

    Route::get('UpdatePassword', [App\Http\Controllers\Client\ClientController::class, 'UpdatePassword'])
        ->name('ClientUpdatePassword');
});
