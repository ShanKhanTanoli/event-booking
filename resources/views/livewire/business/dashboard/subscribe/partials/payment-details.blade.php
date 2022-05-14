<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">
                {{ trans('business.subscribe-payment-details') }}
            </h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="container">
            <form wire:submit.prevent='PayNow' id="subscribe-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3">
                            <label for="card_holder_name">{{ trans('business.subscribe-card-holder-name') }}</label>
                            <input id="card-holder-name" type="text" wire:model.defer='card_holder_name'
                                value="{{ old('card_holder_name') }}"
                                class="form-control  @error('card_holder_name') is-invalid @enderror"
                                placeholder="{{ trans('business.subscribe-card-holder-name') }}">
                            @error('card_holder_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3">
                            <label for="card_number">{{ trans('business.subscribe-card-number') }}</label>
                            <input id="card-number" type="text" wire:model.defer='card_number'
                                value="{{ old('card_number') }}"
                                class="form-control  @error('card_number') is-invalid @enderror"
                                placeholder="{{ trans('business.subscribe-card-number') }}">
                            @error('card_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3">
                            <label for="card_expiry">{{ trans('business.subscribe-card-expiry') }}</label>
                            <input id="card-expiry" type="date" wire:model.defer='card_expiry'
                                value="{{ old('card_expiry') }}"
                                class="form-control  @error('card_expiry') is-invalid @enderror"
                                placeholder="{{ trans('business.subscribe-card-expiry') }}">
                            @error('card_expiry')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-static my-3">
                            <label for="card_cvc">{{ trans('business.subscribe-card-cvc') }}</label>
                            <input id="card-cvc" type="text" wire:model.defer='card_cvc'
                                value="{{ old('card_cvc') }}"
                                class="form-control  @error('card_cvc') is-invalid @enderror"
                                placeholder="{{ trans('business.subscribe-card-cvc') }}">
                            @error('card_cvc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button id="card-button" style="width:100%;" data-secret="{{ $intent->client_secret }}"
                            type="submit" class="btn btn-block btn-primary" wire:attr='disabled'>
                            <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true">
                            </span>
                            <i class="fab fa-stripe-cc"></i>
                            {{ trans('business.subscribe-pay-now-btn') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
