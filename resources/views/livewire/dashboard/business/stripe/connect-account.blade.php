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
                            @if (Business::StripeConnectAccountID(Auth::user()->id))
                            @if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
                            <!--Begin::Complete Your Account-->
                            @if (!$account->payouts_enabled)
                            <i class="fas fa-fw fa-clipboard-list"></i>
                                Complete Your Account
                            @else
                            <i class="fas fa-fw fa-money-check"></i>
                            Account is Ready
                            @endif
                            <!--End::Complete Your Account-->
                            @else
                                <i class="fas fa-fw fa-university"></i>
                                Create Account
                            @endif
                            @else
                            <i class="fas fa-fw fa-university"></i>
                            Create Account
                            @endif
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
