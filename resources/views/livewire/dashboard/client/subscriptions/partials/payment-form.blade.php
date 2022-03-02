<div class="col-xl-7 mb-4 mb-md-0">
    <div class="py-4 d-flex justify-content-center">
        <h4>
            <strong>
                Pay & Subscribe
            </strong>
        </h4>
    </div>
    <div class="pt-2">
        <form class="pb-3">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Card Holder Name</label>
                        <input wire:model.defer="card_holder_name"
                            class="form-control @error('card_holder_name') is-invalid @enderror" id="card_holder_name"
                            type="text" placeholder="John Doe" value="{{ old('card_holder_name') }}"
                            @if ($client = Client::Is(Auth::user()->id)) @if ($client->subscribedTo($plan->id)) disabled @endif
                            @endif>
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
                            placeholder="Enter Card Number" value="{{ old('card_number') }}"
                            @if ($client = Client::Is(Auth::user()->id)) @if ($client->subscribedTo($plan->id)) disabled @endif
                            @endif>
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
                            class="form-control @error('card_expiry_month') is-invalid @enderror"
                            @if ($client = Client::Is(Auth::user()->id)) @if ($client->subscribedTo($plan->id)) disabled @endif
                            @endif>
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
                            class="form-control @error('card_expiry_year') is-invalid @enderror"
                            @if ($client = Client::Is(Auth::user()->id)) @if ($client->subscribedTo($plan->id)) disabled @endif
                            @endif>
                            <option value="">Year</option>
                            @for ($i = 2040; $i > 1970; $i--)
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
                        <input wire:model.defer="card_cvc" class="form-control @error('card_cvc') is-invalid @enderror"
                            type="number" placeholder="123" value="{{ old('card_cvc') }}"
                            @if ($client = Client::Is(Auth::user()->id)) @if ($client->subscribedTo($plan->id)) disabled @endif
                            @endif>
                        @error('card_cvc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
        @if ($client = Client::Is(Auth::user()->id))
            @if (!$client->subscribedTo($plan->id))
                <button wire:click="PayNow()" wire:loading.attr='disabled' class="btn btn-primary btn-block btn-lg"
                    type="button">
                    <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Pay Now
                </button>
            @else
                <button class="btn btn-primary btn-block btn-lg" type="button" disabled>
                    <i class="fas fa-check"></i>
                    Subscribed
                </button>
            @endif
        @endif
    </div>
</div>
