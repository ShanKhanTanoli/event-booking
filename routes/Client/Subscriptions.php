<?php
Route::get('MySubscriptions', [App\Http\Controllers\Client\ClientSubscriptionController::class, 'MySubscriptions'])
    ->name('ClientSubscriptions');

Route::get('Subscribe/{price_id}', [App\Http\Controllers\Client\ClientSubscriptionController::class, 'Subscribe'])
    ->name('ClientSubscribe');

Route::post('PayForSubscription', [App\Http\Controllers\Client\ClientSubscriptionController::class, 'PayForSubscription'])
    ->name('ClientPayForSubscription');

Route::get('ChangePlan/{price_id}', [App\Http\Controllers\Client\ClientSubscriptionController::class, 'ChangePlan'])
    ->name('ClientChangePlan');

Route::post('PayForChangingPlan', [App\Http\Controllers\Client\ClientSubscriptionController::class, 'PayForChangingPlan'])
    ->name('ClientPayForChangingPlan');
