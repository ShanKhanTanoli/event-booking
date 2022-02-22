<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Admin\Admin;
use App\Helpers\Client\Client;
use App\Helpers\Business\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Rinvex\Subscriptions\Models\Plan;

class ClientSubscriptionController extends Controller
{
    protected $path = 'dashboard.client.';

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'client']);
    }

    public function MySubscriptions()
    {
        return view($this->path . 'subscriptions.index');
    }

    public function Subscribe($price_id)
    {
        if ($plan = Plan::where('price_id', $price_id)->first()) {

            if ($plan->is_active) {
                if (Business::Is($plan->user_id)) {
                    return view($this->path . 'subscriptions.subscribe.index', compact('plan'));
                } else {
                    session()->flash('error', 'Something went wrong');
                    return redirect()->route('ClientPricingPlans');
                }
            } else {
                session()->flash('error', 'Something went wrong');
                return redirect()->route('ClientPricingPlans');
            }
        } else {
            session()->flash('error', 'Something went wrong');
            return redirect()->route('ClientPricingPlans');
        }
    }

    public function PayForSubscription()
    {
        if ($plan = Plan::where('price_id', request('plan'))->first()) {
            if ($business = Business::Is(Auth::user()->created_by)) {
                if ($connect_id = Business::StripeConnectAccountID($business->id)) {
                    return Client::PaySubscribe(
                        Auth::user()->id,
                        $plan->price * 100,
                        $plan->currency,
                        request('token'),
                        Admin::Settings()->commission_percentage / ($plan->price) * 100,
                        $plan->id,
                        $connect_id,
                    );
                } else {
                    return ('Please contact your business owner');
                }
            } else {
                return ('Something went wrong');
            }
        } else {
            return ('Something went wrong');
        }
    }

    public function ChangePlan($price_id)
    {
        if ($plan = Plan::where('price_id', $price_id)->first()) {
            if ($plan->is_active) {
                if (Business::Is($plan->user_id)) {
                    return view($this->path . 'subscriptions.changeplan.index', compact('plan'));
                } else {
                    session()->flash('error', 'Something went wrong');
                    return redirect()->route('ClientPricingPlans');
                }
            } else {
                session()->flash('error', 'Something went wrong');
                return redirect()->route('ClientPricingPlans');
            }
        } else {
            session()->flash('error', 'Something went wrong');
            return redirect()->route('ClientPricingPlans');
        }
    }

    public function PayForChangingPlan()
    {
        if ($plan = Plan::where('price_id', request('plan'))->first()) {
            if ($business = Client::Is(Auth::user()->id)) {
                if ($subscription = Client::HasActiveSubscription(Auth::user()->id)) {
                    if ($connect_id = Business::StripeConnectAccountID($business->id)) {
                        return $connect_id;
                        // return Client::PayChangePlan(
                        //     $business->id,
                        //     $plan->price * 100,
                        //     $plan->currency,
                        //     request('token'),
                        //     $plan->id,
                        //     $subscription->id,
                        //     $connect_id,
                        // );
                    } else {
                        return ('Please contact your business owner');
                    }
                } else {
                    return ('Sorry you can not change your plan');
                }
            } else {
                return ('Something went wrong');
            }
        } else {
            return ('Something went wrong');
        }
    }
}
