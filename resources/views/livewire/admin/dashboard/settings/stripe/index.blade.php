<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include(
            'livewire.admin.dashboard.settings.partials.sidebar'
        )
        <!--Begin::Sidebar-->
        <div class="col-lg-9 mt-lg-0 mt-4">
            <!--Begin::Alerts-->
            @include('errors.alerts')
            <!--End::Alerts-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    {{ trans('admin.update-stripe') }}
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form wire:submit.prevent='Update'>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="public_key">{{ trans('admin.stripe-pkey') }}</label>
                                                <input type="text" wire:model.defer='public_key'
                                                    value="{{ old('public_key') }}"
                                                    class="form-control  @error('public_key') is-invalid @enderror"
                                                    placeholder="{{ trans('admin.stripe-pkey') }}">
                                                @error('public_key')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="secret_key">{{ trans('admin.stripe-skey') }}</label>
                                                <input type="text" wire:model.defer='secret_key'
                                                    value="{{ old('secret_key') }}"
                                                    class="form-control  @error('secret_key') is-invalid @enderror"
                                                    placeholder="{{ trans('admin.stripe-skey') }}">
                                                @error('secret_key')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="payment_mode">{{ trans('admin.stripe-mode') }}</label>
                                                <select class="form-control @error('payment_mode') is-invalid @enderror"
                                                    wire:model.defer='payment_mode'>
                                                    <option value="">{{ trans('admin.stripe-mode') }}</option>
                                                    <option value="test">{{ trans('admin.stripe-test-mode') }}
                                                    </option>
                                                    <option value="live">{{ trans('admin.stripe-live-mode') }}
                                                    </option>
                                                </select>
                                                @error('payment_mode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                                <span wire:loading class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true">
                                                </span>
                                                {{ trans('admin.save-changes') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
