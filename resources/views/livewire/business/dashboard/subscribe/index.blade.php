<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3 d-flex">
        <div class="col-8">
            <!--Begin::Payment Details-->
            @include(
                'livewire.business.dashboard.subscribe.partials.payment-details'
            )
            <!--End::Payment Details-->
        </div>
        <div class="col-4">
            <!--Begin::Plan Info-->
            @include('livewire.business.dashboard.subscribe.partials.plan-details')
            <!--End::Plan Info-->
        </div>
    </div>
</div>
