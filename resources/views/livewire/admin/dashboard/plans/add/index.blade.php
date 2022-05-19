<div class="container-fluid">
    @include('errors.alerts')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            {{ trans('admin.add-plan') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form wire:submit.prevent='Add'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">{{ trans('admin.plan-name') }}</label>
                                        <input type="text" wire:model.defer='name' value="{{ old('name') }}"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            placeholder="{{ trans('admin.plan-name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="amount">{{ trans('admin.plan-amount') }}
                                            ({{ strtoupper(Admin::Currency()) }})</label>
                                        <input type="text" wire:model.defer='amount' value="{{ old('amount') }}"
                                            class="form-control  @error('amount') is-invalid @enderror"
                                            placeholder="{{ trans('admin.plan-amount') }} ({{ strtoupper(Admin::Currency()) }})">
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="description">{{ trans('admin.plan-description') }}</label>
                                        <textarea wire:model.defer='description' class="form-control  @error('description') is-invalid @enderror"
                                            placeholder="{{ trans('admin.plan-description') }}">
                                            {{ old('description') }}
                                        </textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="plan_type">{{ trans('admin.plan-type') }}</label>
                                        <select type="text" wire:model='plan_type'
                                            class="form-control  @error('plan_type') is-invalid @enderror">
                                            <option value="">{{ trans('admin.plan-type') }}</option>
                                            <option value="onetime">{{ trans('admin.plan-one-time') }}</option>
                                            <option value="recurring">{{ trans('admin.plan-recurring') }}</option>
                                        </select>
                                        @error('plan_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <span wire:loading wire:target='plan_type' class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true">
                                    </span>
                                </div>
                                @if ($plan_type == 'recurring')
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static my-3">
                                            <label
                                                for="interval-count">{{ trans('admin.plan-interval-count') }}</label>
                                            <input type="text" wire:model.defer='interval_count'
                                                value="{{ old('interval_count') }}"
                                                class="form-control  @error('interval_count') is-invalid @enderror"
                                                placeholder="{{ trans('admin.plan-interval-count') }}">
                                            @error('interval_count')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group input-group-static my-3">
                                            <label
                                                for="billing-period">{{ trans('admin.plan-billing-period') }}</label>
                                            <select type="text" wire:model.defer='interval'
                                                class="form-control  @error('interval') is-invalid @enderror">
                                                <option value="">{{ trans('admin.plan-billing-period') }}</option>
                                                <option value="day">Day</option>
                                                <option value="week">Week</option>
                                                <option value="month">Month</option>
                                                <option value="year">Year</option>
                                            </select>
                                            @error('interval')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                        <span wire:loading wire:target='Add' class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true">
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
