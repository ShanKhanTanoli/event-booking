<?php

Route::get('PricingPlans',[App\Http\Controllers\Client\ClientController::class, 'PricingPlans'])
->name('ClientPricingPlans');


Route::get('Pay/{price_id}/Now',[App\Http\Controllers\Client\ClientController::class, 'PayNow'])
->name('ClientPayNow');


Route::post('ChargeNow',[App\Http\Controllers\Client\ClientController::class, 'ChargeNow'])
->name('ClientChargeNow');