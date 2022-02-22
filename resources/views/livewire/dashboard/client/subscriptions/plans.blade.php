<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if (Admin::Get())
        <!--If Not Admin-->
        @if ($plans = Admin::Plans(Admin::Get()->id))
            <div class="row justify-content-center align-align-items-center">
                <!--Begin::Pricing Plans-->
                @foreach ($plans as $plan)
                    @if ($plan->is_active)
                        <div class="mb-4 col-xl-4 col-lg-6">
                            <div class="card text-center h-100">
                                <div class="card-body">
                                    <strong class="mb-4">
                                        {!! substr($plan->name, 0, 15) !!}
                                    </strong>
                                    <div class="small mb-4 mt-4">
                                        {!! substr($plan->description, 0, 25) !!}
                                    </div>
                                    <div class="mb-4 mt-4">
                                        <strong>
                                            Price
                                            {{ $plan->price }}
                                            {{ strtoupper($plan->currency) }}
                                        </strong>
                                    </div>
                                    @if ($plan->signup_fee > 0)
                                        <div class="mb-4 mt-4">
                                            <strong>
                                                Application Fee
                                                {{ $plan->signup_fee }}%
                                            </strong>
                                        </div>
                                    @endif
                                    <ul class="list-group list-group-flush small">
                                        <li style="border:none;" class="list-group-item">
                                            <strong>
                                                Can Create
                                                {{ $plan->reservations }}
                                                Reservations
                                            </strong>
                                        </li>
                                        <li style="border:none;" class="list-group-item">
                                            <strong>
                                                Duration
                                                {{ $plan->invoice_period }}
                                                {{ ucfirst($plan->invoice_interval) }}
                                            </strong>
                                        </li>
                                    </ul>
                                    <div class="d-grid">
                                        @if ($business = Business::Is(Auth::user()->id))
                                            @if ($business->subscribedTo($plan->id))
                                                <button class="btn btn-primary btn-block my-3 fw-500" disabled>
                                                    <i class="fas fa-check "></i>
                                                    Subscribed
                                                </button>
                                            @else
                                                @if ($active = Business::HasActiveSubscription(Auth::user()->id))
                                                    <button type="button" wire:loading.attr='disabled'
                                                        wire:click="ChangePlan('{{ $plan->id }}')"
                                                        class="btn btn-primary btn-block my-3 fw-500">
                                                        <span wire:loading
                                                            wire:target="ChangePlan('{{ $plan->id }}')"
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        <i class="fab fa-stripe "></i>
                                                        Change Plan
                                                    </button>
                                                @else
                                                    <button type="button" wire:loading.attr='disabled'
                                                        wire:click="PayNow('{{ $plan->id }}')"
                                                        class="btn btn-primary btn-block my-3 fw-500">
                                                        <span wire:loading wire:target="PayNow('{{ $plan->id }}')"
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        <i class="fab fa-stripe "></i>
                                                        Pay Now
                                                    </button>
                                                @endif
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <!--End::Pricing Plans-->
            </div>
        @else
            <div class="row justify-content-center align-align-items-center">
                <div class="col-xl-12">
                    <div class="alert alert-danger  text-center" role="alert">
                        <h4 class="alert-heading">
                            <i class="fas fa-exclamation-triangle fa-5x"></i>
                        </h4>
                        <strong class="mt-2">
                            Pricing Plans will be available soon.
                        </strong>
                    </div>
                </div>
            </div>
        @endif
        <!--If Not Admin-->
    @else
        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                <div class="alert alert-danger  text-center" role="alert">
                    <h4 class="alert-heading">
                        <i class="fas fa-exclamation-triangle fa-5x"></i>
                    </h4>
                    <strong class="mt-2">
                        Pricing Plans will be available soon.
                    </strong>
                </div>
            </div>
        </div>
        <!--If Not Admin-->
    @endif
</div>
