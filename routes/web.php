<?php

use Carbon\Carbon;
use App\Models\User;
use App\Helpers\Slot;
use App\Helpers\Stripe;
use App\Helpers\Booking;
use App\Models\ClientBooking;
use App\Helpers\Client\Client;
use App\Helpers\Business\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('UserBusiness', function () {

    dd('user_business');
})->name('user_business');

Route::get('Refresh', function () {

    dd('refresh_url');
})->name('refresh_url');



Route::get('Return', function () {

    dd('return_url');
})->name('return_url');

Route::get('debug', function () {

    //jenny.rosen@example.com

    //You must update your Connect branding settings with 
    //business name, icon, brand color in order to create an account link.
    //You can set the missing fields at 
    //https://dashboard.stripe.com/settings/connect.

    /*
        "icon" => null
        "logo" => null
        "primary_color" => null
        "secondary_color" => null
    */

    /*
        Needs to be True
        charges_enabled,details_submitted,payouts_enabled
    */

    /*
        Create Connect Account
         'country' => $country,
                    'type' => 'express',
                    'email' => $email,
                    'capabilities' => [
                      'card_payments' => ['requested' => true],
                      'transfers' => ['requested' => true],
                    ],
                    'business_type' => 'individual',
                    'individual' => [
                       'first_name' => 'Shan',
                       'last_name' => 'Khan',
                       'email' => $email,
                       'phone' => '+10000000000',
                       'ssn_last_4' => '5678',
                       'dob' => [
                        'day' => 1,
                        'month' => 3,
                        'year' => 1995,
                       ],
                    ],

        Charge Info
        id: "ch_3KVI2QRXmAQzp1r90Pzjmkhk"
        object: "charge"
        amount: 1000
        amount_captured: 1000
        amount_refunded: 0
        application: "ca_GgNzDRKkiLjCvGZYVZd3qOwmOurqmQkP"
        application_fee: "fee_1KVI2RRXmAQzp1r96v4bFPjn"
        application_fee_amount: 100
        balance_transaction: "txn_3KVI2QRXmAQzp1r90KNylEYz"
        billing_details: Stripe\StripeObject {#1472 ▶}
        calculated_statement_descriptor: "SHANKHAN.COM"
        captured: true
        created: 1645373610
        currency: "usd"
        customer: null
        description: "Payment"
        destination: null
        dispute: null
        disputed: false
        failure_code: null
        failure_message: null
        fraud_details: []
        invoice: null
        livemode: false
        metadata: Stripe\StripeObject {#1473 ▶}
        on_behalf_of: null
        order: null
        outcome: Stripe\StripeObject {#1478 ▶}
        paid: true
        payment_intent: null
        payment_method: "card_1KVI2QRXmAQzp1r9jBQ4Slsi"
        payment_method_details: Stripe\StripeObject {#1485 ▶}
        receipt_email: null
        receipt_number: null
        receipt_url: "https://pay.stripe.com/receipts/acct_1KVH0XRXmAQzp1r9/ch_3KVI2QRXmAQzp1r90Pzjmkhk/rcpt_LBfNsAzm7TzA0GFVFGhHBIvYcBhfobs"
        refunded: false
        refunds: Stripe\Collection {#1489 ▶}
        review: null
        shipping: null
        source: Stripe\Card {#1494 ▶}
        source_transfer: null
        statement_descriptor: null
        statement_descriptor_suffix: null
        status: "succeeded"
        transfer_data: null
        transfer_group: null
    */

    /*
        Fields to Create Account
        $country,
        $type,
        $email,
        $business_type,
        $first_name,
        $last_name,
        $phone,
        $ssn_last_4,
        $dob_day,
        $dob_month,
        $dob_year
    */

    //$account = Stripe::CreateAccount($country, $type, $email, $business_type, $first_name, $last_name, $phone, $ssn_last_4, $dob_day, $dob_month, $dob_year);

    //$link = Stripe::CreateAccountLink($account->id,route('refresh_url'),route('return_url'),'account_onboarding');

    //return redirect($link->url);

    //Verified Account
    $account = 'acct_1KVH0XRXmAQzp1r9';

    //Restricted Account
    $restricted = 'acct_1KVH0LRiGUGr13em';

    dd(Stripe::RetrieveAccount($account));
    dd(Stripe::CreateLoginLink($account));

    // $stripe = Stripe::Client();

    //Stripe::CardChargeForBusiness($amount, $currency, $source, $description);

    //Stripe::CardChargeForClient($amount, $currency, $source, $application_fee_amount, $description, $stripe_account);

    /*
            Sample Card
        'number' => '4242424242424242',
        'exp_month' => 2,
        'exp_year' => 2023,
        'cvc' => '314',
    */

    //Hamid ACC 3126383000003200


    // Auth::logout();

    // $request->session()->invalidate();

    // $request->session()->regenerateToken();

    // return redirect('/');
    //dd(Auth::logout());
});

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes(['verify' => true]);

/*Begin::Custom Registration*/
Route::get('{business}/register', [App\Http\Controllers\Auth\RegisterController::class, 'RegisterAsClient'])
    ->name('RegisterAsClient');

Route::post('SaveAsClient/{business}', [App\Http\Controllers\Auth\RegisterController::class, 'SaveAsClient'])
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
