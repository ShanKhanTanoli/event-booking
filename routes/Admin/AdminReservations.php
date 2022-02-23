<?php
Route::get('Reservations', [App\Http\Controllers\Admin\AdminController::class, 'Reservations'])
    ->name('AdminReservations');

Route::get('Edit/{slug}/Reservation', [App\Http\Controllers\Admin\AdminController::class, 'EditReservation'])
    ->name('AdminEditReservation');

Route::get('ViewReservation/{slug}/Slots', [App\Http\Controllers\Admin\AdminController::class, 'ViewReservationSlots'])
    ->name('AdminViewReservationSlots');
