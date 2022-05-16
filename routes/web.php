<?php

use App\Helpers\Redirect;
use App\Helpers\Admin\Admin;
use App\Helpers\Stripe\Stripe;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::routes();


Route::get('lang/{lang?}', function ($lang = "en") {
    App::setLocale($lang);
    return trans('lang.msg');
});

Route::get('debug', function () {
   
    $user = Auth::user();

    dd(Business::Language($user->id));

    $stripe = Stripe::Client();
    
    // $product = $stripe->products->create([
    //     'name' => 'Gold Special',
    //     'description' => 'This is the Product',
    //   ]);

    // $price = $stripe->prices->create([
    //     'unit_amount' => 2000,
    //     'currency' => 'usd',
    //     'recurring' => ['interval' => 'month','interval_count' => 1],
    //     'product' => 'prod_Lgz1t8mvOha4tP',
    //   ]);


    $product = "prod_Lgz1t8mvOha4tP";
    $price = "price_1Kzb6UDz8ngwza7q2oXBVuSY";

    //$paymentMethods = $user->paymentMethods();
    
    $pm = "pm_1KzbLwDz8ngwza7qQyC9clXX";

    dd($user->subscription($price)->resume());

    dd($user->subscription($price)->onGracePeriod());

    //Create Subscription
    // $sub = $user->newSubscription(
    //     $price,
    //     $price
    // )->create($pm);

    // dd($sub);

    //Verified Business Account
    $verified_business = 'acct_1KVjQIRYVF7b7SlI';

    //Verified Individual Account
    $verified_individual = 'acct_1KVjJwDGx269Aqtf';

    //Restricts Soon Account
    $account = 'acct_1KVH0XRXmAQzp1r9';

    //Restricted Account
    $restricted = 'acct_1KVH0LRiGUGr13em';

    //4242424242424242
});


Route::get('/home/{lang?}', function () {
    return redirect(Redirect::ToDashboard());
})->name('home');


Route::get('/{lang?}', function ($lang = "en") {
    App::setLocale($lang);
    return redirect(Redirect::ToDashboard());
})->name('main');

/*Begin::Admin Routes*/
include('admin/index.php');
/*End::Admin Routes*/

/*Begin::Business Routes*/
include('business/index.php');
/*End::Business Routes*/

/*Begin::Client Routes*/
include('client/index.php');
/*End::Client Routes*/

/*Begin::Public Routes*/
include('public/index.php');
/*End::Public Routes*/

/*Begin::Auth Routes*/
include('auth/index.php');
/*End::Auth Routes*/
