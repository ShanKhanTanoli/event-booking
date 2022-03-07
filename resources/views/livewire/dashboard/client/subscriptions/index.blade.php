<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
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
                                            @if (Client::CountSubscriptions(Auth::user()) > 0)
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
                                                        @if (!is_null($plan = Plan::find($subscription->plan_id)))
                                                            <td class="text-center">
                                                                <strong>
                                                                    {!! $plan->price !!}
                                                                    {{ strtoupper(Settings::Currency()) }}
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
                                                            @if (Auth::user()->planSubscription($subscription->invoice)->active())
                                                                @if (!Auth::user()->planSubscription($subscription->invoice)->canceled())
                                                                    <span class="badge badge-primary">
                                                                        <i class="fas fa-check"></i> Active
                                                                    </span>
                                                                @endif
                                                            @endif
                                                            @if (Auth::user()->planSubscription($subscription->invoice)->canceled())
                                                                @if (!Auth::user()->planSubscription($subscription->invoice)->ended())
                                                                    <span class="badge badge-danger">
                                                                        <i class="fas fa-stop-circle"></i> Cancelled
                                                                    </span>
                                                                @endif
                                                            @endif
                                                            @if (Auth::user()->planSubscription($subscription->invoice)->ended())
                                                                <span class="badge badge-danger">
                                                                    <i class="fas fa-hourglass-end"></i> Ended
                                                                </span>
                                                            @endif
                                                            @if (Auth::user()->planSubscription($subscription->invoice)->onTrial())
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
                                                            @if (!Auth::user()->planSubscription($subscription->invoice)->ended())
                                                                <button
                                                                    wire:click="End('{{ $subscription->invoice }}')"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-primary">
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
