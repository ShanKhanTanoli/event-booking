<?php

use App\Models\User;
use App\Helpers\Slot;
use App\Helpers\Booking;
use App\Models\Reservation;
use Illuminate\Support\Str;
use App\Helpers\Subscription;
use App\Helpers\Client\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Rinvex\Subscriptions\Models\Plan;

Route::get('debug', function () {

    //Res DAYBVVW1HDCFALYA

    $slots = Reservation::where('slug','QOV279IJS7ZR42W0')
    ->first()->slots;

    $clients = User::where('role_id',3)
    ->take(12)->get();

    foreach($clients as $client){
        foreach($slots as $slot){
        	Booking::new($client->id, $slot->id,mt_rand(1,10));
        }	
    }

    return 'Done!';

    //Booking::new($user, $slot, $subscription)

    // $client = User::where('reg_no','4ZXRXEYDPIRAW42GKO0J8IBGBST7NB')
    // ->first();

    // $plan = Plan::where('user_id',$client->created_by)
    // ->first();

    // $subs = Client::CreateSubscription($client->id,Str::random(10),Str::random(10), $plan->id);

    // $cancel = Client::EndSubscription($client->id,'#7657672748');


    //Alejandro account
    $alejandro_account = "acct_1KWRpQPE3FBXawqb";

    //Verified Business Account
    $verified_business = 'acct_1KVjQIRYVF7b7SlI';

    //Verified Individual Account
    $verified_individual = 'acct_1KVjJwDGx269Aqtf';

    //Restricts Soon Account
    $account = 'acct_1KVH0XRXmAQzp1r9';

    //Restricted Account
    $restricted = 'acct_1KVH0LRiGUGr13em';



    //Hamid ACC 3126383000003200


    // Auth::logout();

    // $request->session()->invalidate();

    // $request->session()->regenerateToken();

    // return redirect('/');
});

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes(['verify' => true]);

/*Begin::Custom Registration*/
Route::get('{business_user_name}/register', [App\Http\Controllers\Auth\RegisterController::class, 'RegisterAsClient'])
    ->name('RegisterAsClient');

Route::post('SaveAsClient/{business_user_name}', [App\Http\Controllers\Auth\RegisterController::class, 'SaveAsClient'])
    ->name('SaveAsClient');

Route::get('RegisterBusiness', [App\Http\Controllers\Auth\RegisterController::class, 'RegisterAsBusiness'])
    ->name('RegisterAsBusiness');

Route::post('SaveAsBusiness', [App\Http\Controllers\Auth\RegisterController::class, 'SaveAsBusiness'])
    ->name('SaveAsBusiness');
/*End::Custom Registration*/

/*Begin::Admin Routes*/
include('Admin/AdminRoutes.php');
/*End::Admin Routes*/

/*Begin::Business Routes*/
include('Business/BusinessRoutes.php');
/*End::Business Routes*/

/*Begin::Client Routes*/
include('Client/ClientRoutes.php');
/*End::Client Routes*/
