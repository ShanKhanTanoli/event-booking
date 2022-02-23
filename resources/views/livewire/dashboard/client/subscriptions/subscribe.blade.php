<div class="container">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if ($client = Client::Is(Auth::user()->id))
        @if (!$client->subscribedTo($plan->id))
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
        @else
            <div class="alert alert-danger" role="alert">
                <strong>You are already subscribed to this plan.</strong>
            </div>
        @endif
    @endif
</div>
