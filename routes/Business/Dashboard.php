<?php

Route::get('Dashboard', [App\Http\Controllers\Business\BusinessController::class, 'Dashboard'])
    ->name('BusinessDashboard');
