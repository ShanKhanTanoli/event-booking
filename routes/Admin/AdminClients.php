<?php

Route::get('Clients', [App\Http\Controllers\Admin\AdminController::class, 'Clients'])
->name('AdminClients');

Route::get('Client/{reg_no}/Edit', [App\Http\Controllers\Admin\AdminController::class, 'EditClient'])
->name('AdminEditClient');

Route::get('Client/{reg_no}/Subscriptions', [App\Http\Controllers\Admin\AdminController::class, 'ViewClientSubscriptions'])
->name('AdminViewClientSubscriptions');

Route::get('Client/{reg_no}/ChangePassword', [App\Http\Controllers\Admin\AdminController::class, 'ChangeClientPassword'])
->name('AdminChangeClientPassword');