<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row justify-content-center align-align-items-center">
        <!--Begin::Plan Details-->
        @include('livewire.dashboard.business.subscriptions.plandetails')
        <!--Begin::Plan Details-->
        @if ($business = Business::Is(Auth::user()->id))
            @if (Business::HasActiveSubscription(Auth::user()->id))
                @if (!$business->subscribedTo($plan->id))
                    @section('scripts')
                        <script>
                            var stripe = Stripe("{{ Stripe::PublicKey() }}");
                            var elements = stripe.elements();
                            var style = {
                                base: {
                                    fontSize: '16px',
                                    color: '#32325d',
                                },
                            };
                            var card = elements.create('card', {
                                style: style
                            });
                            card.mount('#card-element');
                            var form = document.getElementById('payment-form');
                            form.addEventListener('submit', function(event) {
                                event.preventDefault();
                                $('#payNow').prop('disabled', true);
                                $('#spinner').css("display", "inline-block");
                                stripe.createToken(card).then(function(result) {
                                    if (result.error) {
                                        card.clear();
                                        $('#payNow').prop('disabled', false);
                                        $('#spinner').css("display", "none");
                                        var errorElement = document.getElementById('card-errors');
                                        errorElement.textContent = result.error.message;
                                    } else {
                                        card.clear();
                                        $('#card-errors').css("display", "none");
                                        $('#payNow').prop('disabled', true);
                                        $('#spinner').css("display", "inline-block");
                                        stripeTokenHandler(result.token);
                                    }
                                });
                            });

                            function stripeTokenHandler(token) {
                                var form = document.getElementById('payment-form');
                                var hiddenInput = document.createElement('input');
                                hiddenInput.setAttribute('type', 'hidden');
                                hiddenInput.setAttribute('name', 'stripeToken');
                                hiddenInput.setAttribute('value', token.id);
                                form.appendChild(hiddenInput);
                                card.clear();
                                $('#card-errors').css("display", "none");
                                $('#payNow').prop('disabled', true);
                                $('#spinner').css("display", "inline-block");
                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('BusinessPayForChangingPlan') }}",
                                    data: {
                                        token: token.id,
                                        plan: "{{ $plan->price_id }}",
                                    },
                                    success: function(response) {
                                        $('#payNow').prop('disabled', false);
                                        $('#spinner').css("display", "none");
                                        $('#card-errors').css("display", "none");
                                        var errorElement = document.getElementById('card-success');
                                        errorElement.textContent = response;
                                    },
                                    error: function(error) {
                                        $('#payNow').prop('disabled', false);
                                        $('#spinner').css("display", "none");
                                        var errorElement = document.getElementById('card-errors');
                                        errorElement.textContent = error;
                                    }
                                });
                            }
                        </script>
                    @endsection
                @endif
            @endif
        @endif
    </div>
</div>
