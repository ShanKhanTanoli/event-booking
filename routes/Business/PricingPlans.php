<?php
Route::get('PricingPlans', [App\Http\Controllers\Business\BusinessController::class, 'Plans'])
    ->name('BusinessPlans');

Route::get('AddPricingPlan', [App\Http\Controllers\Business\BusinessController::class, 'AddPricingPlan'])
    ->name('BusinessAddPricingPlan');

Route::get('Edit/{price_id}/PricingPlan', [App\Http\Controllers\Business\BusinessController::class, 'EditPricingPlan'])
    ->name('BusinessEditPricingPlan');

Route::get('SubscriptionsPlans', [App\Http\Controllers\Business\BusinessController::class, 'SubscriptionsPlans'])
    ->name('PlatformSubscriptionsPlans');
