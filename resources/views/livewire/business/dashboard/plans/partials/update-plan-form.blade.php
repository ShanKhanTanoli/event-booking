<form wire:submit.prevent='Update'>
    <div class="row">
        <div class="col-md-6">
            <div class="input-group input-group-static my-3">
                <label for="name">{{ trans('business.plan-name') }}</label>
                <input type="text" wire:model.defer='name' value="{{ old('name') }}"
                    class="form-control  @error('name') is-invalid @enderror"
                    placeholder="{{ trans('business.plan-name') }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group input-group-static my-3">
                <label for="amount">{{ trans('business.plan-amount') }}
                    ({{ strtoupper(Admin::Currency()) }})</label>
                <input type="text" wire:model.defer='amount' value="{{ old('amount') }}"
                    class="form-control  @error('amount') is-invalid @enderror"
                    placeholder="{{ trans('business.plan-amount') }} ({{ strtoupper(Admin::Currency()) }})">
                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group input-group-static my-3">
                <label for="interval-count">{{ trans('business.plan-interval-count') }}</label>
                <input type="text" wire:model.defer='interval_count' value="{{ old('interval_count') }}"
                    class="form-control  @error('interval_count') is-invalid @enderror"
                    placeholder="{{ trans('business.plan-interval-count') }}">
                @error('interval_count')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group input-group-static my-3">
                <label for="billing-period">{{ trans('business.plan-billing-period') }}</label>
                <select type="text" wire:model.defer='interval'
                    class="form-control  @error('interval') is-invalid @enderror">
                    <option value="">{{ trans('business.plan-billing-period') }}</option>
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
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                </span>
                {{ trans('business.save-changes') }}
            </button>
        </div>
    </div>
</form>
