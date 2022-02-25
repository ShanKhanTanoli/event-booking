<?php

namespace App\Http\Livewire\Dashboard\Admin\Business;

use App\Models\User;
use Livewire\Component;
use App\Helpers\Admin\Admin;
use Livewire\WithPagination;

class Viewall extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    public $visibility = 'all';
    public $email_status = 'all';

    public function mount()
    {
        return User::where('role', 'business');
    }

    public function render()
    {
        $business = $this->mount();

        if (!is_null($this->search)) {
            $business = $business->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
            $business = $business->where('role', 'business')
                ->withTrashed();
        }

        /*Begin::Business Visibility*/
        if ($this->visibility == 'all') {
            $business = $business->where('role', 'business')
                ->withTrashed();
        }
        if ($this->visibility == 'banned') {
            $business = $business->where('role', 'business')
                ->onlyTrashed();
        }
        if ($this->visibility == 'banned') {
            $business = $business->where('role', 'business');
        }
        /*End::Business Visibility*/

        /*Begin::Business Email Status*/
        if ($this->email_status == 'all') {
            $business = $business->where('role', 'business')
                ->withTrashed();
        }
        if ($this->email_status == 'verified') {
            $business = $business->where('email_verified_at', '!=', null)
                ->withTrashed();
        }
        if ($this->email_status == 'unverified') {
            $business = $business->where('email_verified_at', null)
                ->withTrashed();
        }
        /*End::Business Email Status*/

        $business = $business->paginate(8);

        return view('livewire.dashboard.admin.business.viewall')
            ->with([
                'business' => $business,
            ]);
    }

    public function UnVerifyEmail($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->update(['email_verified_at' => null]);
            redirect(route('AdminBusiness'));
            return session()->flash('error', 'Email has been Unverified & Business owner needs to verify this Email');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function VerifyEmail($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->update(['email_verified_at' => now()]);
            redirect(route('AdminBusiness'));
            return session()->flash('success', 'Email has been Verified Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }

    /*Begin::Activate & Ban a Business*/
    public function BanNow($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->delete();
            redirect(route('AdminBusiness'));
            return session()->flash('error', 'Business has been Banned Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }

    public function ActivateNow($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->restore();
            redirect(route('AdminBusiness'));
            return session()->flash('success', 'Business has been Activated Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }
    /*End::Activate & Ban a Business*/

    public function Edit($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            return redirect(route('AdminEditBusiness', $user->reg_no));
        } else session()->flash('error', 'Something went wrong!');
    }

    public function Delete($business)
    {
        if ($user = Admin::CheckBusiness($business)) {
            $user->forceDelete();
            redirect(route('AdminBusiness'));
            return session()->flash('success', 'Business has been Deleted Successfully!');
        } else session()->flash('error', 'Something went wrong!');
    }
}
