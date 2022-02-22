<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Helpers\Business\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    protected $path = 'dashboard.business.';

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'business']);
    }

    public function Dashboard()
    {
        return view($this->path . 'index');
    }

    public function Clients()
    {
        return view($this->path . 'clients.index');
    }

    public function AddClient()
    {
        return view($this->path . 'clients.add.index');
    }

    public function EditClient($reg_no)
    {
        if ($client = Business::CheckClientByRegNo(Auth::user()->id, $reg_no)) {
            return view($this->path . 'clients.edit.index', compact('client'));
        } else {
            session()->flash('error', 'No such client found!');
            return redirect(route('BusinessClients'));
        }
    }

    public function Plans()
    {
        return view($this->path . 'plans.index');
    }

    public function EditPricingPlan($price_id)
    {
        if ($plan = Business::PlanFindByPriceId(Auth::user()->id, $price_id)) {
            return view($this->path . 'plans.edit.index', compact('plan'));
        } else {
            session()->flash('error', 'something went wrong');
            return redirect(route('BusinessPlans'));
        }
    }

    public function AddPricingPlan()
    {
        return view($this->path . 'plans.add.index');
    }

    public function SubscriptionsPlans()
    {
        return view($this->path .'subscriptions.plans.index');
    }



    public function Profile()
    {
        return view($this->path . 'profile.index');
    }

    public function Details()
    {
        return view($this->path . 'details.index');
    }

    public function Permissions()
    {
        return view($this->path . 'permissions.index');
    }

    public function ViewBusiness()
    {
        return view($this->path . 'viewbusiness.index');
    }

    public function UpdatePassword()
    {
        return view($this->path . 'password.index');
    }

    public function ConnectAccount()
    {
        return view($this->path . 'stripe.ConnectAccount.index');
    }

    public function Settings()
    {
        return view($this->path . 'settings.index');
    }
}
