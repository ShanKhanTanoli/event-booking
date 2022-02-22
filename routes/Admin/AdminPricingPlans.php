<?php
    Route::get('PricingPlans',[App\Http\Controllers\Admin\AdminController::class , 'PricingPlans'])
    ->name('AdminPricingPlans');

    Route::get('AddPricingPlans',[App\Http\Controllers\Admin\AdminController::class , 'AddPricingPlans'])
    ->name('AdminAddPricingPlans');

    Route::get('PricingPlan/{price_id}/Edit',[App\Http\Controllers\Admin\AdminController::class , 'EditPricingPlan'])
    ->name('AdminEditPricingPlan');