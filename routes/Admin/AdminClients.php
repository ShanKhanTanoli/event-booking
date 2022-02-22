<?php

Route::get('Clients', [App\Http\Controllers\Admin\AdminController::class, 'Clients'])
->name('AdminClients');

Route::get('Edit/{user_name}/Client', [App\Http\Controllers\Admin\AdminController::class, 'EditClient'])
->name('AdminEditClient');

Route::get('Client/{user_name}/ChangePassword', [App\Http\Controllers\Admin\AdminController::class, 'ChangeClientPassword'])
->name('AdminChangeClientPassword');

Route::get('{user_name}/Clients', [App\Http\Controllers\Admin\AdminController::class, 'EditClients'])
->name('AdminEditClients');