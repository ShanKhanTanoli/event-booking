<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <!--Begin::Sidebar-->
        @include('livewire.dashboard.admin.clients.partials.sidebar')
        <!--Begin::Sidebar-->

        <!--Begin::Subscription Modal-->
        @include('livewire.dashboard.admin.clients.partials.create-subscription')
        <!--Begin::Subscription Modal-->
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="col p-0">
                                    {!! $client->name  !!} Subscriptions
                                </div>
                                <div class="col text-right p-0">
                                    <button type="button" data-toggle="modal" data-target="#SubscriptionModal" style="border:none; padding:0px; background-color:transparent;" type="button">
                                    <span class="badge badge-primary">
                                        <i class="fa fa-fw fa-money-bill"></i>
                                        Create Subscription
                                    </span>
                                    </button>
                                    <a href="{{ route('AdminClients') }}"
                                        style="border:none; padding:0px; background-color:transparent;" type="button">
                                        <span class="badge badge-primary">
                                            <i class="fa fa-fw fa-users"></i>
                                            View Clients
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" cellspacing="0"
                                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th>Invoice</th>
                                                        <th class="text-center">Plan</th>
                                                        <th class="text-center">Price</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Starts At</th>
                                                        <th class="text-center">Ends At</th>
                                                        <th class="text-center">End</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($subscriptions->count() > 0)
                                                        @foreach ($subscriptions as $subscription)
                                                            <tr>
                                                                <td>
                                                                    <strong>
                                                                        {{ $subscription->invoice }}
                                                                    </strong>
                                                                </td>
                                                                @if (!is_null($plan = Plan::find($subscription->plan_id)))
                                                                    <td class="text-center">
                                                                        <strong>
                                                                            {!! $plan->name !!}
                                                                        </strong>
                                                                    </td>
                                                                @else
                                                                    <td class="text-center">
                                                                        <span class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true">
                                                                        </span>
                                                                    </td>
                                                                @endif
                                                                    <td class="text-center">
                                                                        <strong>
                                                                            {!! $plan->price !!}
                                                                            {{ strtoupper(Settings::Currency()) }}
                                                                        </strong>
                                                                    </td>
                                                                <td class="text-center">
                                                                    @if ($client->planSubscription($subscription->invoice)->active())
                                                                        @if (!$client->planSubscription($subscription->invoice)->canceled())
                                                                            <span class="badge badge-primary">
                                                                                <i class="fas fa-check"></i> Active
                                                                            </span>
                                                                        @endif
                                                                    @endif
                                                                    @if ($client->planSubscription($subscription->invoice)->canceled())
                                                                        @if (!$client->planSubscription($subscription->invoice)->ended())
                                                                            <span class="badge badge-danger">
                                                                                <i class="fas fa-stop-circle"></i> Cancelled
                                                                            </span>
                                                                        @endif
                                                                    @endif
                                                                    @if ($client->planSubscription($subscription->invoice)->ended())
                                                                        <span class="badge badge-danger">
                                                                            <i class="fas fa-hourglass-end"></i> Ended
                                                                        </span>
                                                                    @endif
                                                                    @if ($client->planSubscription($subscription->invoice)->onTrial())
                                                                        <span class="badge badge-danger">
                                                                            <i class="fas fa-calendar-alt"></i> On Trial
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    <strong>
                                                                        {{ date('d M, Y', strtotime($subscription->starts_at)) }}
                                                                    </strong>
                                                                </td>
                                                                <td class="text-center">
                                                                    <strong>
                                                                        {{ date('d M, Y', strtotime($subscription->ends_at)) }}
                                                                    </strong>
                                                                </td>
                                                                <td class="text-center">
                                                                    @if (!$client->planSubscription($subscription->invoice)->ended())
                                                                        <button
                                                                            wire:click="End('{{ $subscription->invoice }}')"
                                                                            style="padding:0px; border:none; background-color:transparent">
                                                                            <span class="badge badge-primary">
                                                                                <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                                                <i class="fas fa-hourglass-end"></i> End Now
                                                                            </span>
                                                                        </button>
                                                                    @else
                                                                        <span class="badge badge-danger">
                                                                            <i class="fas fa-hourglass-end"></i> Ended
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr class="text-center">
                                                            <td colspan="8">
                                                                <strong>
                                                                    No Data Found
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                                {{ $subscriptions->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
