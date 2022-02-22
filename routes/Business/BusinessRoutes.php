<?php

Route::prefix('Business')->middleware(['auth', 'business', 'verified'])->group(function () {

    Route::get('Dashboard', [App\Http\Controllers\Business\BusinessController::class, 'Dashboard'])
        ->name('BusinessDashboard');

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
    include('BusinessSubscriptions.php');
    /*End::Subscriptions*/

    Route::get('Profile', [App\Http\Controllers\Business\BusinessController::class, 'Profile'])
        ->name('BusinessProfile');

    Route::get('Details', [App\Http\Controllers\Business\BusinessController::class, 'Details'])
        ->name('BusinessDetails');

    Route::get('Permissions', [App\Http\Controllers\Business\BusinessController::class, 'Permissions'])
        ->name('BusinessPermissions');

    Route::get('UpdatePassword', [App\Http\Controllers\Business\BusinessController::class, 'UpdatePassword'])
        ->name('BusinessUpdatePassword');

    Route::get('ConnectAccount', [App\Http\Controllers\Business\BusinessController::class, 'ConnectAccount'])
        ->name('BusinessConnectAccount');

    Route::get('Settings', [App\Http\Controllers\Business\BusinessController::class, 'Settings'])
        ->name('BusinessSettings');

    Route::get('View/{business_user_name}/AsPublicly', [App\Http\Controllers\Business\BusinessController::class, 'ViewBusiness'])
        ->name('ViewBusiness');
});
