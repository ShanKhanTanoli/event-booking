<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card border-left-primary shadow mb-2">
                <div class="card-body">
                    <strong>
                        {!! substr($reservation->name, 0, 30) !!}
                        (Total {{ number_format(Business::CountSlots($reservation->id)) }} Slots)
                    </strong>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-md-12">
            <div class="card border-left-primary shadow mb-2">
                <div class="card-body">
                    <strong>
                        This is useful when you want to create Slots for Specific Days.
                    </strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            Specific Days
                        </div>
                        <div class="card-body">
                            <form class="form" novalidate="">
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Select Day</label>
                                            <select wire:model.defer="state.day"
                                                class="form-control @error('day') is-invalid @enderror">
                                                <option value="">Select Day</option>
                                                <option value="Sun">Sunday</option>
                                                <option value="Mon">Monday</option>
                                                <option value="Tue">Tuesday</option>
                                                <option value="Wed">Wednesday</option>
                                                <option value="Thu">Thursday</option>
                                                <option value="Fri">Friday</option>
                                                <option value="Sat">Saturday</option>
                                            </select>
                                            @error('day')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Starting Date</label>
                                            <input wire:model.defer="state.start_date"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                id="start_date" type="date" placeholder="Reservation Date"
                                                value="{{ old('start_date') }}">
                                            @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ending Date</label>
                                            <input wire:model.defer="state.end_date"
                                                class="form-control @error('end_date') is-invalid @enderror"
                                                id="end_date" type="date" placeholder="Reservation Date"
                                                value="{{ old('end_date') }}">
                                            @error('end_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Starting Time</label>
                                            <input wire:model.defer="state.start_time"
                                                class="form-control @error('start_time') is-invalid @enderror"
                                                id="start_time" type="time" placeholder="Starting Time"
                                                value="{{ old('start_time') }}">
                                            @error('start_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ending Time</label>
                                            <input wire:model.defer="state.end_time"
                                                class="form-control @error('end_time') is-invalid @enderror"
                                                id="end_time" type="time" placeholder="Ending Time"
                                                value="{{ old('end_time') }}">
                                            @error('end_time')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Capacity</label>
                                            <input wire:model.defer="state.capacity"
                                                class="form-control @error('capacity') is-invalid @enderror"
                                                id="capacity" type="number" placeholder="Seating Capacity"
                                                value="{{ old('capacity') }}">
                                            @error('capacity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Book Before (Client can book before
                                                Minutes)</label>
                                            <input wire:model.defer="state.can_book_before"
                                                class="form-control @error('can_book_before') is-invalid @enderror"
                                                id="can_book_before" type="number" placeholder="Enter Minutes"
                                                value="{{ old('can_book_before') }}">
                                            @error('can_book_before')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Cancel Before (Client can cancel before
                                                Minutes)</label>
                                            <input wire:model.defer="state.can_cancel_before"
                                                class="form-control @error('can_cancel_before') is-invalid @enderror"
                                                id="can_cancel_before" type="number" placeholder="Enter Minutes"
                                                value="{{ old('can_cancel_before') }}">
                                            @error('can_cancel_before')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3 mt-3">
                                    <div class="col d-flex">
                                        <!-- Save changes button-->
                                        <button wire:click="AddSlots" wire:loading.attr='disabled'
                                            class="btn btn-primary" type="button">
                                            <span wire:loading wire:target="AddSlots"
                                                class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Save Changes
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
