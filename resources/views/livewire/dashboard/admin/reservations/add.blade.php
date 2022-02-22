<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            Add Reservation
                        </div>
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form class="form" novalidate="">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Reservation Name</label>
                                                                <input wire:model.defer="state.name"
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    id="name" type="text" placeholder="Gym Reservation"
                                                                    value="{{ old('name') }}">
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Starting Date</label>
                                                                <input wire:model.defer="state.start_date"
                                                                    class="form-control @error('start_date') is-invalid @enderror"
                                                                    id="start_date" type="date"
                                                                    placeholder="Reservation Date"
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
                                                                    id="end_date" type="date"
                                                                    placeholder="Reservation Date"
                                                                    value="{{ old('end_date') }}">
                                                                @error('end_date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Starting Time</label>
                                                                <input wire:model.defer="state.start_time"
                                                                    class="form-control @error('start_time') is-invalid @enderror"
                                                                    id="start_time" type="time"
                                                                    placeholder="Starting Time"
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
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Token Cost (USD)</label>
                                                                <input wire:model.defer="state.token_cost"
                                                                    class="form-control @error('token_cost') is-invalid @enderror"
                                                                    id="token_cost" type="text"
                                                                    placeholder="Token Cost in USD"
                                                                    value="{{ old('token_cost') }}">
                                                                @error('token_cost')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Capacity</label>
                                                                <input wire:model.defer="state.capacity"
                                                                    class="form-control @error('capacity') is-invalid @enderror"
                                                                    id="capacity" type="number"
                                                                    placeholder="Seating Capacity"
                                                                    value="{{ old('capacity') }}">
                                                                @error('capacity')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Book Before (Client can book before
                                                                    Minutes)</label>
                                                                <input wire:model.defer="state.can_book_before"
                                                                    class="form-control @error('can_book_before') is-invalid @enderror"
                                                                    id="can_book_before" type="number"
                                                                    placeholder="Enter Minutes"
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
                                                                    id="can_cancel_before" type="number"
                                                                    placeholder="Enter Minutes"
                                                                    value="{{ old('can_cancel_before') }}">
                                                                @error('can_cancel_before')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <!-- Save changes button-->
                                                    <button wire:click="AddNow()" wire:loading.attr='disabled'
                                                        class="btn btn-primary" type="button">
                                                        <span wire:loading class="spinner-border spinner-border-sm"
                                                            role="status" aria-hidden="true"></span>
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
        </div>
    </div>
</div>
