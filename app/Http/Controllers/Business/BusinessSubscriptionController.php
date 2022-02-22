<?php

namespace App\Http\Controllers\Business;

use Exception;
use App\Helpers\Admin\Admin;
use Illuminate\Http\Request;
use App\Helpers\Business\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Rinvex\Subscriptions\Models\Plan;

class BusinessSubscriptionController extends Controller
{
    protected $path = 'dashboard.business.';

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'business']);
    }

    public function MySubscriptions()
    {
        return view($this->path . 'subscriptions.index');
    }

    public function Subscribe($price_id)
    {
        if ($plan = Plan::where('price_id', $price_id)->first()) {

            if ($plan->is_active) {
                if (Admin::Is($plan->user_id)) {
                    return view($this->path . 'subscriptions.subscribe.index', compact('plan'));
                } else {
                    session()->flash('error', 'Something went wrong');
                    return redirect()->route('PlatformSubscriptionsPlans');
                }
            } else {
                session()->flash('error', 'Something went wrong');
                return redirect()->route('PlatformSubscriptionsPlans');
            }
        } else {
            session()->flash('error', 'Something went wrong');
            return redirect()->route('PlatformSubscriptionsPlans');
        }
    }

    public function PayForSubscription()
    {
        if ($plan = Plan::where('price_id', request('plan'))->first()) {
            if ($business = Business::Is(Auth::user()->id)) {
                return Business::PaySubscribe(
                    $business->id,
                    $plan->price * 100,
                    $plan->currency,
                    request('token'),
                    $plan->id
                );
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
                if (Admin::Is($plan->user_id)) {
                    return view($this->path . 'subscriptions.changeplan.index', compact('plan'));
                } else {
                    session()->flash('error', 'Something went wrong');
                    return redirect()->route('PlatformSubscriptionsPlans');
                }
            } else {
                session()->flash('error', 'Something went wrong');
                return redirect()->route('PlatformSubscriptionsPlans');
            }
        } else {
            session()->flash('error', 'Something went wrong');
            return redirect()->route('PlatformSubscriptionsPlans');
        }
    }

    public function PayForChangingPlan()
    {
        if ($plan = Plan::where('price_id', request('plan'))->first()) {
            if ($business = Business::Is(Auth::user()->id)) {
                if ($subscription = Business::HasActiveSubscription(Auth::user()->id)) {
                    return Business::PayChangePlan(
                        $business->id,
                        $plan->price * 100,
                        $plan->currency,
                        request('token'),
                        $plan->id,
                        $subscription->id,
                    );
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
