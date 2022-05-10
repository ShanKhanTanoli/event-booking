<?php

use App\Helpers\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

//Auth::routes();


Route::get('lang/{lang?}', function ($lang = "en") {
    App::setLocale($lang);
    return trans('lang.msg');
});

Route::get('debug', function () {

    //Verified Business Account
    $verified_business = 'acct_1KVjQIRYVF7b7SlI';

    //Verified Individual Account
    $verified_individual = 'acct_1KVjJwDGx269Aqtf';

    //Restricts Soon Account
    $account = 'acct_1KVH0XRXmAQzp1r9';

    //Restricted Account
    $restricted = 'acct_1KVH0LRiGUGr13em';
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
