<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <!--Begin::Stripe Status-->
    @include('livewire.dashboard.business.stripe.stripe-status')
    <!--End::Stripe Status-->
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            Complete your profile
                        </div>
                        <div class="card-body">
                            @if (Business::StripeConnectAccountID(Auth::user()->id))

                            @if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
                                <!--Begin::Account Completed Form-->
                                @include('livewire.dashboard.business.stripe.partials.account-completed')
                                <!--End::Account Completed Form-->
                            @else
                             <!--Begin::Complete Account Form-->
                             @include('livewire.dashboard.business.stripe.partials.complete-account-form')
                             <!--End::Complete Account Form-->
                            @endif
                            
                            @else
                                <!--Begin::Complete Account Form-->
                                @include('livewire.dashboard.business.stripe.partials.complete-account-form')
                                <!--End::Complete Account Form-->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
