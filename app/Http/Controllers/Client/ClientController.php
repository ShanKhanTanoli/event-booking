<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Helpers\Client\Client;
use App\Helpers\Business\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    protected $path = 'dashboard.client.';

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'client']);
    }

    public function Dashboard()
    {
        return view($this->path . 'index');
    }

    public function PricingPlans()
    {
        return view($this->path . 'pricingplans.index');
    }

    public function PayNow($price_id)
    {
        if ($plan = Business::PlanFindByPriceId(Auth::user()->created_by, $price_id)) {
            return view($this->path . 'pricingplans.paynow.index',compact('plan'));
        }else{
            session()->flash('error', 'Something went wrong');
            return redirect(route('ClientPricingPlans'));
        }
    }

    public function ChargeNow()
    {
        return request('token');
    }



    public function Profile()
    {
        return view($this->path . 'profile.index');
    }

    public function JoinedBusiness()
    {
        return view($this->path . 'joinedbusiness.index');
    }

    public function UpdatePassword()
    {
        return view($this->path . 'password.index');
    }
}
