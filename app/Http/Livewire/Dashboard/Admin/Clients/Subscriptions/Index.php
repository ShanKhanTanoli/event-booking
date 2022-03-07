<?php

namespace App\Http\Livewire\Dashboard\Admin\Clients\Subscriptions;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Helpers\Client\Client;
use Rinvex\Subscriptions\Models\Plan;
use Rinvex\Subscriptions\Models\PlanSubscription;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $client;

    public $price_id;

    public function render()
    {
        $subscriptions = PlanSubscription::where('subscriber_id', $this->client->id)
            ->latest()->paginate(6);
        return view('livewire.dashboard.admin.clients.subscriptions.index')
            ->with([
                'client' => $this->client,
                'subscriptions' => $subscriptions,
            ]);
    }


    public function End($invoice)
    {
        if (Client::HasActiveSubscription($this->client->id)) {
            return Client::EndSubscription($this->client->id, $invoice);
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
        if (Client::Is($this->client->id)) {
            if (!Client::HasActiveSubscription($this->client->id)) {
                $plan = Plan::where('user_id', $this->client->created_by)
                    ->where('price_id', $this->price_id)
                    ->first();
                if (!is_null($plan)) {
                    Client::CreateSubscription($this->client->id, Str::random(10), Str::random(10), $plan->id);
                    return redirect(route('AdminViewClientSubscriptions', $this->client->reg_no));
                } else {
                    session()->flash('error', 'Something went wrong');
                    return redirect(route('AdminViewClientSubscriptions', $this->client->reg_no));
                }
            } else {
                session()->flash('error', 'Client has already an active aubscription.');
                return redirect(route('AdminViewClientSubscriptions', $this->client->reg_no));
            }
        } else {
            session()->flash('error', 'Something went wrong');
            return redirect(route('AdminViewClientSubscriptions', $this->client->reg_no));
        }
    }
}
