<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mb-4">
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminEvents', App::getLocale()) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-credit-card opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                                {{ trans('admin.events') }}
                            </p>
                            <h4 class="mb-0">
                                {{ Event::count() }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminSlotTypes', ['slug' => $event->slug, 'lang' => App::getLocale()]) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-filter opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                                {{ trans('admin.add-new') }}
                            </p>
                            <h4 class="mb-0">
                                {{ trans('admin.slot-types') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminAddEvent', App::getLocale()) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-plus opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                                {{ trans('admin.add-new') }}
                            </p>
                            <h4 class="mb-0">
                                {{ trans('admin.event') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary text-white" role="alert">
                <strong>
                    <i class="fas fa-info-circle"></i>
                    {{ trans('admin.specific-day-slot-info') }}
                </strong>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            {{ trans('admin.add-specific-day-slots') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form wire:submit.prevent='Add'>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="day">{{ trans('admin.slot-select-day') }}</label>
                                        <select wire:model.defer='day'
                                            class="form-control  @error('day') is-invalid @enderror">
                                            <option value="">{{ trans('admin.slot-select-day') }}</option>
                                            <option value="Mon">Monday</option>
                                            <option value="Tue">Tuesday</option>
                                            <option value="Wed">Wednesday</option>
                                            <option value="Thu">Thursday</option>
                                            <option value="Fri">Friday</option>
                                            <option value="Sat">Saturday</option>
                                            <option value="Sun">Sunday</option>
                                        </select>
                                        @error('day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="starting_date">{{ trans('admin.slot-starting-date') }}</label>
                                        <input type="date" wire:model.defer='starting_date'
                                            value="{{ old('starting_date') }}"
                                            class="form-control  @error('starting_date') is-invalid @enderror"
                                            placeholder="{{ trans('admin.slot-starting-date') }}">
                                        @error('starting_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="ending_date">{{ trans('admin.slot-ending-date') }}</label>
                                        <input type="date" wire:model.defer='ending_date'
                                            value="{{ old('ending_date') }}"
                                            class="form-control  @error('ending_date') is-invalid @enderror"
                                            placeholder="{{ trans('admin.slot-ending-date') }}">
                                        @error('ending_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="starting_time">{{ trans('admin.slot-starting-time') }}</label>
                                        <input type="time" wire:model.defer='starting_time'
                                            value="{{ old('starting_time') }}"
                                            class="form-control  @error('starting_time') is-invalid @enderror"
                                            placeholder="{{ trans('admin.slot-starting-time') }}">
                                        @error('starting_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="ending_time">{{ trans('admin.slot-ending-time') }}</label>
                                        <input type="time" wire:model.defer='ending_time'
                                            value="{{ old('ending_time') }}"
                                            class="form-control  @error('ending_time') is-invalid @enderror"
                                            placeholder="{{ trans('admin.slot-ending-time') }}">
                                        @error('ending_time')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="capacity">{{ trans('admin.slot-capacity') }}</label>
                                        <input type="text" wire:model.defer='capacity' value="{{ old('capacity') }}"
                                            class="form-control  @error('capacity') is-invalid @enderror"
                                            placeholder="{{ trans('admin.slot-capacity') }}">
                                        @error('capacity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label
                                            for="can_book_before">{{ trans('admin.slot-can-book-before') }}</label>
                                        <input type="text" wire:model.defer='can_book_before'
                                            value="{{ old('can_book_before') }}"
                                            class="form-control  @error('can_book_before') is-invalid @enderror"
                                            placeholder="{{ trans('admin.slot-can-book-before') }}">
                                        @error('can_book_before')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label for="can_book_until">{{ trans('admin.slot-can-book-until') }}</label>
                                        <input type="text" wire:model.defer='can_book_until'
                                            value="{{ old('can_book_until') }}"
                                            class="form-control  @error('can_book_until') is-invalid @enderror"
                                            placeholder="{{ trans('admin.slot-can-book-until') }}">
                                        @error('can_book_until')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group input-group-static my-3">
                                        <label
                                            for="can_cancel_before">{{ trans('admin.slot-can-cancel-before') }}</label>
                                        <input type="text" wire:model.defer='can_cancel_before'
                                            value="{{ old('can_cancel_before') }}"
                                            class="form-control  @error('can_cancel_before') is-invalid @enderror"
                                            placeholder="{{ trans('admin.slot-can-cancel-before') }}">
                                        @error('can_cancel_before')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
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
