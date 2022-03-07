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

    public function BusinessClients($reg_no)
    {
        if ($business = Admin::CheckBusinessByRegNo($reg_no)) {
            return view($this->path . 'business.clients.index')
                ->with([
                    'business' => $business,
                ]);
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function EditBusiness($reg_no)
    {
        if ($business = Admin::CheckBusinessByRegNo($reg_no)) {
            return view($this->path . 'business.edit.index')
                ->with([
                    'business' => $business,
                ]);
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function ViewSubscriptions($reg_no)
    {
        if ($business = Admin::CheckBusinessByRegNo($reg_no)) {
            return view($this->path . 'business.subscriptions.index')
                ->with([
                    'business' => $business,
                ]);
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function EditBusinessDetails($reg_no)
    {
        if ($business = Admin::CheckBusinessByRegNo($reg_no)) {
            return view($this->path . 'business.edit.businessdetails')
                ->with([
                    'business' => $business,
                ]);
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function EditBusinessAbilities($reg_no)
    {
        if ($business = Admin::CheckBusinessByRegNo($reg_no)) {
            return view($this->path . 'business.edit.abilities')
                ->with([
                    'business' => $business,
                ]);
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function ChangeBusinessPassword($reg_no)
    {
        if ($business = Admin::CheckBusinessByRegNo($reg_no)) {
            return view($this->path . 'business.edit.changepassword')
                ->with([
                    'business' => $business,
                ]);
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminBusiness'));
        }
    }

    public function Clients()
    {
        return view($this->path . 'clients.index');
    }

    public function EditClient($reg_no)
    {
        if ($client = Admin::CheckClientByRegNo($reg_no)) {
            return view($this->path . 'clients.edit.index')
                ->with([
                    'client' => $client,
                ]);
        }
        session()->flash('error', 'Something went wrong!');
        return redirect(route('AdminClients'));
    }

    public function ViewClientSubscriptions($reg_no)
    {
        if ($client = Admin::CheckClientByRegNo($reg_no)) {
            return view($this->path . 'clients.subscriptions.index')
                ->with([
                    'client' => $client,
                ]);
        }
        session()->flash('error', 'Something went wrong!');
        return redirect(route('AdminClients'));
    }

    public function ChangeClientPassword($reg_no)
    {
        if ($client = Admin::CheckClientByRegNo($reg_no)) {
            return view($this->path . 'clients.edit.changepassword')
                ->with([
                    'client' => $client,
                ]);
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
            return view($this->path . 'pricingplans.edit.index')
                ->with([
                    'plan' => $plan,
                ]);
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
            return view($this->path . 'reservations.edit.index')
                ->with([
                    'reservation' => $reservation,
                ]);
        } else {
            session()->flash('error', 'Something went wrong!');
            return redirect(route('AdminReservations'));
        }
    }

    public function ViewReservationSlots($slug)
    {
        if ($reservation = Admin::FindReservationBySlug($slug)) {
            return view($this->path . 'reservations.slots.index')
                ->with([
                    'reservation' => $reservation,
                ]);
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
