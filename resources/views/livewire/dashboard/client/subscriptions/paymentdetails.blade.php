<form wire:ignore class="form mt-4" id="payment-form">
    <div>
        <div class="form-group">
            <label for="card-element">
                Plan Price
            </label>
            <input placeholder="Plan Price" type="text" value="{{ $plan->price }} {{ $plan->currency }}" id="amount"
                class="form-control" disabled />
        </div>
        @if ($client = Client::Is(Auth::user()->id))
        @if (!$client->subscribedTo($plan->id))
        <div class="form-group">
            <label for="card-element">
                Credit or debit card
            </label>
            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>
        </div>
        <div class="form-group">
            <!-- Used to display Element errors. -->
            <div id="card-errors" role="alert"></div>
            <!-- Used to display success messages. -->
            <div id="card-success" class="text-success" role="alert"></div>
        </div>
        @endif
        @endif
    </div>
    <div class="form-row mt-2">
        @if ($client = Client::Is(Auth::user()->id))
            @if ($client->subscribedTo($plan->id))
                <button class="payment-button" disabled>
                    <span style="display: none;" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true">
                    </span>
                    <i class="fas fa-check"></i>
                    Subscribed
                </button>
            @else
                <button id="payNow" class="payment-button">
                    <span id="spinner" style="display: none;" class="spinner-border spinner-border-sm" role="status"
                        aria-hidden="true"></span>
                    Pay Now
                </button>
            @endif
        @endif
    </div>
</form>
