<div class="container">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="card">
        <div class="card-body">
            <div class="row d-flex justify-content-center pb-5">
                <!--Begin::Payment Form-->
                @include('livewire.dashboard.client.subscriptions.paymentform')
                <!--End::Payment Form-->

                <!--Begin::Choosen Plan-->
                @include('livewire.dashboard.client.subscriptions.choosenplan')
                <!--End::Choosen Plan-->
            </div>
        </div>
    </div>
</div>
