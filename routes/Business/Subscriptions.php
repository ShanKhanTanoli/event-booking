<?php
Route::get('MySubscriptions', [App\Http\Controllers\Business\BusinessSubscriptionController::class, 'MySubscriptions'])
    ->name('BusinessSubscriptions');

Route::get('Subscribe/{price_id}', [App\Http\Controllers\Business\BusinessSubscriptionController::class, 'Subscribe'])
    ->name('BusinessSubscribe');

Route::post('PayForSubscription', [App\Http\Controllers\Business\BusinessSubscriptionController::class, 'PayForSubscription'])
    ->name('BusinessPayForSubscription');

Route::get('ChangePlan/{price_id}', [App\Http\Controllers\Business\BusinessSubscriptionController::class, 'ChangePlan'])
    ->name('BusinessChangePlan');

Route::post('PayForChangingPlan', [App\Http\Controllers\Business\BusinessSubscriptionController::class, 'PayForChangingPlan'])
    ->name('BusinessPayForChangingPlan');
