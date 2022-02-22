<div class="col-xl-12">
    <div class="card shadow">
        <div class="card-header" style="border: none; background-color:transparent;">
            Pay Now and Subscribe
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid"
                                aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th class="text-center">Price</th>
                                        @if ($plan->signup_fee > 0)
                                            <th class="text-center">SignUp Price</th>
                                        @endif
                                        <th class="text-center">Duration</th>
                                        <th class="text-center">Reservations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>
                                                {!! substr(ucfirst($plan->name), 0, 15) !!}
                                            </strong>
                                        </td>
                                        <td>
                                            <strong>
                                                {!! substr($plan->description, 0, 15) !!}...
                                            </strong>
                                        </td>
                                        <td class="text-center">
                                            <strong>
                                                {{ $plan->price }}
                                                {{ strtoupper($plan->currency) }}
                                            </strong>
                                        </td>
                                        @if ($plan->signup_fee > 0)
                                            <td class="text-center">
                                                <strong>
                                                    {{ $plan->signup_fee }}
                                                    {{ strtoupper($plan->currency) }}
                                                </strong>
                                            </td>
                                        @endif
                                        <td class="text-center">
                                            <span class="badge badge-primary">
                                                <i class="fas fa-calendar-alt"></i>
                                                {{ $plan->invoice_period }}
                                                {{ ucfirst($plan->invoice_interval) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            @if (Business::PlanFeatureById(Auth::user()->created_by, $plan->id))
                                                <strong>
                                                    {{ Business::PlanFeatureById(Auth::user()->created_by, $plan->id)->value }}
                                                </strong>
                                            @else
                                                <strong>
                                                    <span class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                </strong>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--Begin::Payment Details-->
            @include('livewire.dashboard.client.pricingplans.paymentdetails')
            <!--Begin::Payment Details-->
        </div>
    </div>
</div>
