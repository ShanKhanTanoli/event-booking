<div class="col-xl-7 mb-4 mb-md-0">
    @if (!$business->subscribedTo($plan->id))
    <div class="py-4 d-flex justify-content-center">
        <h4>
            <strong>
                Pay & Subscribe
            </strong>
        </h4>
    </div>
    @endif
    <div class="pt-2">
        @if (!$business->subscribedTo($plan->id))
            <form class="pb-3">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Card Holder Name</label>
                            <input wire:model.defer="card_holder_name"
                                class="form-control @error('card_holder_name') is-invalid @enderror"
                                id="card_holder_name" type="text" placeholder="John Doe"
                                value="{{ old('card_holder_name') }}">
                            @error('card_holder_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Card Number</label>
                            <input wire:model.defer="card_number"
                                class="form-control @error('card_number') is-invalid @enderror" type="number"
                                placeholder="Enter Card Number" value="{{ old('card_number') }}">
                            @error('card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Month</label>
                            <select wire:model.defer="card_expiry_month"
                                class="form-control @error('card_expiry_month') is-invalid @enderror">
                                <option value="">Month</option>
                                @for ($i = 1; $i < 13; $i++)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('card_expiry_month')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>Year</label>
                            <select wire:model.defer="card_expiry_year"
                                class="form-control @error('card_expiry_year') is-invalid @enderror">
                                <option value="">Year</option>
                                @for ($i = 1970; $i < 2051; $i++)
                                    <option value="{{ $i }}">
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                            @error('card_expiry_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label>CVC</label>
                                <input wire:model.defer="card_cvc"
                                    class="form-control @error('card_cvc') is-invalid @enderror" type="text"
                                    placeholder="123" value="{{ old('card_cvc') }}">
                                @error('card_cvc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
            </form>
            <button wire:click="PayNow()" wire:loading.attr='disabled' class="btn btn-primary btn-block btn-lg"
                type="button">
                <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Pay Now
            </button>
        @else
            <div class="alert alert-default mt-5" role="alert">
                <h4 class="alert-heading text-center mt-4">
                    <i class="fas fa-check-circle fa-5x text-success"></i>
                </h4>
                <p class="text-center mt-5">
                    <strong>
                        You are Successfully Subscribed to this plan.
                    </strong>
                </p>
            </div>
        @endif
    </div>
</div>
