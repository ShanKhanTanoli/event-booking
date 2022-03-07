<?php

namespace App\Http\Livewire\Dashboard\Admin\Business\Subscriptions;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Helpers\Business\Business;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanSubscription;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $business;

    public $price_id;

    public function render()
    {
        $subscriptions = PlanSubscription::where('subscriber_id', $this->business->id)
            ->latest()->paginate(6);
        return view('livewire.dashboard.admin.business.subscriptions.index')
            ->with([
                'business' => $this->business,
                'subscriptions' => $subscriptions,
            ]);
    }


    public function End($invoice)
    {
        if (Business::HasActiveSubscription($this->business->id)) {
            return Business::EndSubscription($this->business->id, $invoice);
        } else return session()->flash('error', 'Something went wrong');
    }

    public function CreateSubscription()
    {
        $msg = [
            'price_id.required' => 'Please select a Pricing Plan.',
        ];
        $this->validate([
            'price_id' => 'required|string',
        ], $msg);
        if (Business::Is($this->business->id)) {
            if (!Business::HasActiveSubscription($this->business->id)) {
                $plan = Plan::where('user_id', $this->business->created_by)
                    ->where('price_id', $this->price_id)
                    ->first();
                if (!is_null($plan)) {
                    Business::CreateSubscription($this->business->id, Str::random(10), Str::random(10), $plan->id);
                    return redirect(route('AdminViewBusinessSubscriptions', $this->business->reg_no));
                } else {
                    session()->flash('error', 'Something went wrong');
                    return redirect(route('AdminViewBusinessSubscriptions', $this->business->reg_no));
                }
            } else {
                session()->flash('error', 'Client has already an active aubscription.');
                return redirect(route('AdminViewBusinessSubscriptions', $this->business->reg_no));
            }
        } else {
            session()->flash('error', 'Something went wrong');
            return redirect(route('AdminViewBusinessSubscriptions', $this->business->reg_no));
        }
    }
}
