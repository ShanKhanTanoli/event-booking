<div class="container-fluid">
    @include('errors.alerts')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            {{ trans('business.update-plan') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">


                        <!--Begin::If Business has Connect Account-->
                        @if ($account = Auth::user()->account_id)

                            <!--Begin::If Business has Valid Connect Account-->
                            @if ($retrieve = Stripe::RetrieveAccount($account))

                                <!--Begin::If Payouts are not Enabled-->
                                @if (!$retrieve->payouts_enabled)
                                    <div class="alert alert-danger text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Payouts are not enabled</strong>
                                    </div>
                                @endif
                                <!--End::If Payouts are not Enabled-->

                                <!--Begin::If Charges are not Enabled-->
                                @if (!$retrieve->charges_enabled)
                                    <div class="alert alert-danger text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Charges are not enabled</strong>
                                    </div>
                                @endif
                                <!--End::If Charges are not Enabled-->

                                <!--Begin::If Deatils are not Enabled-->
                                @if (!$retrieve->details_submitted)
                                    <div class="alert alert-danger text-white">
                                        <i class="fas fa-info-circle"></i>
                                        <strong>Details are not enabled</strong>
                                    </div>
                                @endif
                                <!--End::If Deatils are not Enabled-->

                                <!--Begin::If Business has a Valid Connect Account-->

                                <!--Begin::If Payouts are Enabled-->
                                @if ($retrieve->payouts_enabled && $retrieve->charges_enabled && $retrieve->details_submitted)
                                    <!--Begin::Update Plan-->
                                    @include(
                                        'livewire.business.dashboard.plans.partials.update-plan-form'
                                    )
                                    <!--Begin::Update Plan-->
                                @endif
                                <!--End::If Payouts are Enabled-->

                                <!--End::If Business has a Valid Connect Account-->
                            @else
                                <!--Begin::If Business has not a Valid Connect Account-->
                                <div class="alert alert-info text-white">
                                    <i class="fas fa-info-circle"></i>
                                    <strong>Please create a Stripe Connect Account</strong>
                                </div>
                                <!--End::If Business has not a Valid Connect Account-->
                            @endif
                            <!--End::If Business has Valid Connect Account-->
                        @else
                            <!--Begin::No Account-->
                            <div class="alert alert-info text-white">
                                <i class="fas fa-info-circle"></i>
                                <strong>Please create a Stripe Connect Account</strong>
                            </div>
                            <!--Begin::No Account-->
                        @endif
                        <!--Begin::If Business has Connect Account-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
