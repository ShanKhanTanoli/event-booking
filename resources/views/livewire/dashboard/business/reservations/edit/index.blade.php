<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if (Business::CanUpdateReservation(Auth::user()->id))
        @if ($reservation->status == 'banned')
            <!--Begin::Alerts Notifications-->
            <div class="alert alert-solid alert-danger" role="alert">
                <strong>
                    This Reservation is banned.
                </strong>
            </div>
            <!--Begin::Alerts Notifications-->
        @endif
        <div class="row flex-lg-nowrap">
            <div class="col mb-3">
                <div class="card">
                    <div class="card-header">
                        Update Reservation
                    </div>
                    <div class="card-body">
                        <form class="form" novalidate="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Reservation Name</label>
                                        <input wire:model.defer="state.name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            type="text" placeholder="Gym Reservation" value="{{ old('name') }}"
                                            @if ($reservation->status == 'banned') disabled @endif>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Reservation Status</label>
                                        <select wire:model.defer="state.status"
                                            class="form-control @error('status') is-invalid @enderror"
                                            @if ($reservation->status == 'banned') disabled @endif>
                                            @if ($reservation->status != 'banned')
                                                <option @if ($reservation->status == 'active') selected @endif value="active">
                                                    Active</option>
                                                <option @if ($reservation->status == 'archived') selected @endif value="archived">
                                                    Archived</option>
                                            @else
                                                <option selected value="banned">Banned
                                                </option>
                                            @endif
                                        </select>
                                        @error('status') <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @if ($reservation->status != 'banned')
                                <div class="row">
                                    <div class="col d-flex">
                                        <!-- Save changes button-->
                                        <button wire:click="Update()" wire:loading.attr='disabled'
                                            class="btn btn-primary" type="button">
                                            <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                <div class="alert alert-danger  text-center" role="alert">
                    <h4 class="alert-heading">
                        <i class="fas fa-exclamation-triangle fa-5x"></i>
                    </h4>
                    <strong class="mt-2">
                        You are not allowed to Edit/Update Reservations.Please check your Abilities <a
                            href="{{ route('BusinessPermissions') }}">Here</a>
                    </strong>
                </div>
            </div>
        </div>
    @endif
</div>
