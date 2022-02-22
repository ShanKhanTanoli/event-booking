<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row justify-content-center align-align-items-center">
        <!--Begin::Plan Details-->
        @include('livewire.dashboard.client.pricingplans.plandetails')
        <!--Begin::Plan Details-->
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
                    if (isNaN($('#amount').val()) || $('#amount').val() < 1) {
                        error = "Amount Should be Greator than 1$";
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = error;
                        return false;
                    }
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
                        url: "{{ route('ClientChargeNow') }}",
                        data: {
                            token: token.id,
                            plan: "{{ $plan->id }}",
                            amount: $('#amount').val(),
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
    </div>
</div>
