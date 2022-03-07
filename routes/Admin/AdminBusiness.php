<?php
    Route::get('Business', [App\Http\Controllers\Admin\AdminController::class, 'Business'])
    ->name('AdminBusiness');

Route::get('Business/{reg}/Clients', [App\Http\Controllers\Admin\AdminController::class, 'BusinessClients'])
    ->name('AdminBusinessClients');

Route::get('AddBusiness', [App\Http\Controllers\Admin\AdminController::class, 'AddBusiness'])
    ->name('AdminAddBusiness');

Route::get('{reg_no}/Edit', [App\Http\Controllers\Admin\AdminController::class, 'EditBusiness'])
    ->name('AdminEditBusiness');

Route::get('{reg_no}/Subscriptions', [App\Http\Controllers\Admin\AdminController::class, 'ViewSubscriptions'])
    ->name('AdminViewBusinessSubscriptions');

Route::get('{reg_no}/Abilities', [App\Http\Controllers\Admin\AdminController::class, 'EditBusinessAbilities'])
    ->name('AdminEditBusinessAbilities');

Route::get('{reg_no}/ChangePassword', [App\Http\Controllers\Admin\AdminController::class, 'ChangeBusinessPassword'])
    ->name('AdminChangeBusinessPassword');