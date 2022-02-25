<div class="container">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if ($business = Business::Is(Auth::user()->id))
        <div class="card">
            <div class="card-body">
                <div class="row d-flex justify-content-center pb-5">
                    <!--Begin::Payment Form-->
                    @include('livewire.dashboard.business.subscriptions.paymentform')
                    <!--End::Payment Form-->

                    <!--Begin::Choosen Plan-->
                    @include('livewire.dashboard.business.subscriptions.choosenplan')
                    <!--End::Choosen Plan-->
                </div>
            </div>
        </div>
    @endif
</div>
