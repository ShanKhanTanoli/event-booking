<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mt-3 d-flex">
        <div class="col-8">
            
            @if(Auth::user()->subscribed($plan->plan_id))
            <!--Begin::Already Subscribed-->
            @include('livewire.business.dashboard.subscribe.partials.already-subscribed')
            <!--End::Already Subscribed-->
            @endif

            @if(Auth::user()->subscriptions()->active()->count() > 0)
            <!--Begin::Already has an active subscription-->
            @include('livewire.business.dashboard.subscribe.partials.active-subscription')
            <!--End::Already has an active subscription-->
            @else
            <!--Begin::Payment Details-->
            @include('livewire.business.dashboard.subscribe.partials.payment-details')
            <!--End::Payment Details-->
            @endif

        </div>
        <div class="col-4">
            <!--Begin::Plan Info-->
            @include('livewire.business.dashboard.subscribe.partials.plan-details')
            <!--End::Plan Info-->
        </div>
    </div>
</div>
