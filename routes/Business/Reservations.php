<?php

Route::get('Reservations', [App\Http\Controllers\Business\BusinessReservationController::class, 'Reservations'])
    ->name('BusinessReservations');

Route::get('AddReservations', [App\Http\Controllers\Business\BusinessReservationController::class, 'AddReservations'])
    ->name('BusinessAddReservations');

Route::get('Edit/{slug}/Reservation', [App\Http\Controllers\Business\BusinessReservationController::class, 'EditReservation'])
    ->name('BusinessEditReservation');

Route::get('View/{slug}/Slots', [App\Http\Controllers\Business\BusinessReservationController::class, 'ViewReservationSlots'])
    ->name('BusinessViewReservationSlots');

Route::get('View/Slot/{slug}/Bookings', [App\Http\Controllers\Business\BusinessReservationController::class, 'ViewSlotBookings'])
    ->name('BusinessViewReservationBookings');

Route::get('SelectReservation/{slug}/SlotsType', [App\Http\Controllers\Business\BusinessReservationController::class, 'SelectReservationSlotsType'])
    ->name('BusinessSelectReservationSlotsType');

Route::get('Reservation/{slug}/AddSpecificDaySlots', [App\Http\Controllers\Business\BusinessReservationController::class, 'ReservationAddSpecificDaySlots'])
    ->name('BusinessReservationSpecificDaySlots');

Route::get('Reservation/{slug}/AddWeeklySlots', [App\Http\Controllers\Business\BusinessReservationController::class, 'ReservationAddWeeklySlots'])
    ->name('BusinessReservationWeeklySlots');

Route::get('Reservation/{slug}/AddDailySlots', [App\Http\Controllers\Business\BusinessReservationController::class, 'ReservationAddDailySlots'])
    ->name('BusinessReservationDailySlots');

Route::get('Add/{slug}/Slots', [App\Http\Controllers\Business\BusinessReservationController::class, 'AddReservationSlots'])
    ->name('BusinessAddReservationSlots');
