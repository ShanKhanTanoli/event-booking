<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Helpers\Admin\Admin;
use App\Helpers\Business\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $path = 'dashboard.admin.';

    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function Dashboard()
    {
        return view($this->path . 'index');
    }

    public function Business()
    {
        return view($this->path . 'business.index');
    }

    public function AddBusiness()
    {
        return view($this->path . 'business.add.index');
    }

    public function BusinessClients($user_name)
    {
        if ($business = Admin::CheckBusinessByUsername($user_name)) {

            return view($this->path . 'business.clients.index', compact('business'));
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function EditBusiness($user_name)
    {
        if ($business = Admin::CheckBusinessByUsername($user_name)) {
            return view($this->path . 'business.edit.index', compact('business'));
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function EditBusinessDetails($user_name)
    {
        if ($business = Admin::CheckBusinessByUsername($user_name)) {

            return view($this->path . 'business.edit.businessdetails', compact('business'));
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function EditBusinessAbilities($user_name)
    {
        if ($business = Admin::CheckBusinessByUsername($user_name)) {
            return view($this->path . 'business.edit.abilities', compact('business'));
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function ChangeBusinessPassword($user_name)
    {
        if ($business = Admin::CheckBusinessByUsername($user_name)) {
            return view($this->path . 'business.edit.changepassword', compact('business'));
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function Clients()
    {
        return view($this->path . 'clients.index');
    }

    public function EditClient($user_name)
    {
        if ($client = Admin::CheckClientByUserName($user_name)) {
            return view($this->path . 'clients.edit.index', compact('client'));
        }
        session()->flash('error', 'Something went wrong!');
        return redirect(route('AdminClients'));
    }

    public function ChangeClientPassword($user_name)
    {
        if ($client = Admin::CheckClientByUserName($user_name)) {
            return view($this->path . 'clients.edit.changepassword', compact('client'));
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminClients'));
        }
    }

    public function PricingPlans()
    {
        return view($this->path . 'pricingplans.index');
    }


    function EditPricingPlan($price_id)
    {
        if ($plan = Admin::PlanFindByPriceId(Auth::user()->id, $price_id)) {
            return view($this->path . 'pricingplans.edit.index', compact('plan'));
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminPricingPlans'));
        }
    }

    public function AddPricingPlans()
    {
        return view($this->path . 'pricingplans.add.index');
    }

    public function Reservations()
    {
        return view($this->path . 'reservations.index');
    }

    public function EditReservation($slug)
    {
        if ($reservation = Admin::FindReservationBySlug($slug)) {

            return view($this->path . 'reservations.edit.index', compact('reservation'));
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminReservations'));
        }
    }

    public function Profile()
    {
        return view($this->path . 'profile.index');
    }

    public function Security()
    {
        return view($this->path . 'password.index');
    }

    public function Stripe()
    {
        return view($this->path . 'stripe.index');
    }

    public function Settings()
    {
        return view($this->path . 'settings.index');
    }
}
