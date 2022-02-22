<form wire:ignore class="form mt-4" id="payment-form">
    <div>
        <div class="form-group">
            <label for="card-element">
                Plan Price ( {{ $plan->currency }} )
            </label>
            <input placeholder="Plan Price" type="text" value="{{ $plan->price }}" id="amount"
                class="form-control" disabled />
        </div>
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
    </div>
    <div class="form-row mt-2">
        <button id="payNow" class="payment-button">
            <span id="spinner" style="display: none;" class="spinner-border spinner-border-sm" role="status"
                aria-hidden="true"></span>
            Pay Now
        </button>
    </div>
</form>