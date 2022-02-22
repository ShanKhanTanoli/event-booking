<?php
Route::get('Reservations', [App\Http\Controllers\Client\ClientReservationController::class, 'Reservations'])
    ->name('Reservations');

Route::get('MyReservations', [App\Http\Controllers\Client\ClientReservationController::class, 'MyReservations'])
    ->name('ClientReservations');

Route::get('ViewReservation/{slug}/Slots', [App\Http\Controllers\Client\ClientReservationController::class, 'ViewReservationSlots'])
    ->name('ClientViewReservationSlots');
