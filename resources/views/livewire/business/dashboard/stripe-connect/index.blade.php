<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            {{ trans('business.stripe-connect') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">

                        <!--Begin::If Business has Connect Account-->
                        @if ($account = Auth::user()->account_id)

                            <!--Begin::If Business has Valid Connect Account-->
                            @if ($retrieve = Stripe::RetrieveAccount($account))

                                <!--Begin::If Account is ready to use-->
                                @if ($retrieve->payouts_enabled && $retrieve->charges_enabled && $retrieve->details_submitted)
                                    <div class="alert alert-info text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>{{ trans('business.connect-ready') }}</strong>
                                    </div>
                                @endif
                                <!--End::If Account is ready to use-->

                                <!--Begin::If Payouts are not Enabled-->
                                @if (!$retrieve->payouts_enabled)
                                    <div class="alert alert-danger text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>{{ trans('business.payouts-disabled') }}</strong>
                                    </div>
                                @endif
                                <!--End::If Payouts are not Enabled-->

                                <!--Begin::If Charges are not Enabled-->
                                @if (!$retrieve->charges_enabled)
                                    <div class="alert alert-danger text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>{{ trans('business.charges-disabled') }}</strong>
                                    </div>
                                @endif
                                <!--End::If Charges are not Enabled-->

                                <!--Begin::If Deatils are not submitted-->
                                @if (!$retrieve->details_submitted)
                                    <div class="alert alert-danger text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>{{ trans('business.details-notsubmitted') }}</strong>
                                    </div>
                                @endif
                                <!--End::If Deatils are not submitted-->


                                <!--Begin::If Business has a Valid Connect Account-->
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <!--Begin::If Payouts are not Enabled-->
                                            @if (!$retrieve->payouts_enabled && !$retrieve->charges_enabled && !$retrieve->details_submitted)
                                                <button type="button" class="btn btn-info" wire:attr='disabled'
                                                    wire:click='Complete'>
                                                    <span wire:loading wire:target='Complete'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                        {{ trans('business.complete-account') }}
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-info" wire:attr='disabled'
                                                    wire:click='AccountLogin'>
                                                    <span wire:loading wire:target='AccountLogin'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                        {{ trans('business.account-login') }}
                                                </button>
                                            @endif
                                            <!--End::If Payouts are not Enabled-->
                                        </div>
                                    </div>
                                </form>
                                <!--End::If Business has a Valid Connect Account-->
                            @else
                                <!--Begin::If Business has Not a Valid Connect Account-->
                                <!--Begin::Create Account-->
                                @include(
                                    'livewire.business.dashboard.stripe-connect.partials.create-account'
                                )
                                <!--End::Create Account-->
                                <!--End::If Business Not a has Valid Connect Account-->

                            @endif
                            <!--End::If Business has Valid Connect Account-->
                        @else
                            <!--Begin::Create Account-->
                            @include(
                                'livewire.business.dashboard.stripe-connect.partials.create-account'
                            )
                            <!--End::Create Account-->

                        @endif
                        <!--Begin::If Business has Connect Account-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
