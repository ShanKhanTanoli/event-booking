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
                    <div class="col-md-12">
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
                            <!-- Used to display form errors. -->
                            <div id="card-holder-errors" role="alert"></div>
                        </div>
                    </div>
                    <!--Begin::Stripe Elements-->
                    <div class="col-md-12">
                        <div class="form-row">
                            <label for="card-element">Credit or debit card</label>
                            <div id="card-element" class="form-control">
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="stripe-errors"></div>
                    </div>
                    <!--End::Stripe Elements-->
                    <!--Begin::Stripe Errors-->
                    <div class="col-md-12">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <!--End::Stripe Errors-->

                    <div class="col-md-12 mt-4">
                        <button id="card-button" style="width:100%;" data-secret="{{ $intent->client_secret }}"
                            type="button" class="btn btn-block btn-primary" wire:attr='disabled'>
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

<!--Begin::Stripe Scripts-->
@include(
    'livewire.business.dashboard.subscribe.partials.stripe-scripts'
)
<!--End::Stripe Scripts-->
