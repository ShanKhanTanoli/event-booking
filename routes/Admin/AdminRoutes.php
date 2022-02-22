<?php

Route::prefix('Admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('Dashboard', [App\Http\Controllers\Admin\AdminController::class, 'Dashboard'])
        ->name('AdminDashboard');

    /*Begin::Business*/
    include('AdminBusiness.php');
    /*End::Business*/

    /*Begin::Clients*/
    include('AdminClients.php');
    /*End::Clients*/


    /*Begin::Pricing Plans*/
    include('AdminPricingPlans.php');
    /*End::Pricing Plans*/

    /*Begin::Reservations*/
    include('AdminReservations.php');
    /*End::Reservations*/


    Route::get('Profile', [App\Http\Controllers\Admin\AdminController::class, 'Profile'])
        ->name('AdminProfile');

    Route::get('Security', [App\Http\Controllers\Admin\AdminController::class, 'security'])
        ->name('AdminSecurity');

    Route::get('Stripe', [App\Http\Controllers\Admin\AdminController::class, 'Stripe'])
        ->name('AdminStripe');

    Route::get('Settings', [App\Http\Controllers\Admin\AdminController::class, 'Settings'])
        ->name('AdminSettings');
});
