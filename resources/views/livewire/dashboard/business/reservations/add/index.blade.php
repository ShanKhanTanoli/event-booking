<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if (Business::CanCreateReservation(Auth::user()->id))
        @if ($subscription = Business::HasActiveSubscription(Auth::user()->id))
            <div class="row flex-lg-nowrap">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            Add New
                        </div>
                        <div class="card-body">
                            <form class="form" novalidate="">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Reservation Name</label>
                                            <input wire:model.defer="state.name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                type="text" placeholder="Gym Reservation" value="{{ old('name') }}">
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
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="">Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="archived">Archived</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col d-flex">
                                        <!-- Save changes button-->
                                        <button wire:click="AddNow()" wire:loading.attr='disabled'
                                            class="btn btn-primary" type="button">
                                            <span wire:loading class="spinner-border spinner-border-sm" role="status"
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
        @else
            <div class="row justify-content-center align-align-items-center">
                <div class="col-xl-12">
                    <div class="alert alert-danger  text-center" role="alert">
                        <h4 class="alert-heading">
                            <i class="fas fa-exclamation-triangle fa-5x"></i>
                        </h4>
                        <strong class="mt-2">
                            You don't have any active subscription.
                        </strong>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                <div class="alert alert-danger  text-center" role="alert">
                    <h4 class="alert-heading">
                        <i class="fas fa-exclamation-triangle fa-5x"></i>
                    </h4>
                    <strong class="mt-2">
                        You are not allowed to Create Reservations.Please check your Abilities <a
                            href="{{ route('BusinessPermissions') }}">Here</a>
                    </strong>
                </div>
            </div>
        </div>
    @endif
</div>
