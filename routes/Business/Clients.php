<?php

Route::get('Clients', [App\Http\Controllers\Business\BusinessController::class, 'Clients'])
    ->name('BusinessClients');

Route::get('AddClient', [App\Http\Controllers\Business\BusinessController::class, 'AddClient'])
    ->name('BusinessAddClient');

Route::get('Edit/{reg_no}/Client', [App\Http\Controllers\Business\BusinessController::class, 'EditClient'])
    ->name('BusinessEditClient');
