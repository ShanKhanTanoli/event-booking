@if (Business::CanCreateReservation(Auth::user()->id))
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
                                Create a Client
                            </div>
                            <div class="card-body">
                                <div class="tab-content pt-3">
                                    <form class="form" novalidate="">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input wire:model.defer="state.name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                id="name" type="text" placeholder="John Smith"
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
                                                            <label>Email</label>
                                                            <input wire:model.defer="state.email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                id="email" type="email" placeholder="user@example.com"
                                                                value="{{ old('email') }}">
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Phone</label>
                                                            <input wire:model.defer="state.phone"
                                                                class="form-control @error('phone') is-invalid @enderror"
                                                                id="phone" type="text" placeholder="XXXXXXXXXXXX"
                                                                value="{{ old('phone') }}">
                                                            @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea wire:model.defer="state.address"
                                                                class="form-control @error('address') is-invalid @enderror"
                                                                rows="5"
                                                                placeholder="Address">{{ old('address') }}</textarea>
                                                            @error('address')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-group">
                                                            <label>About</label>
                                                            <textarea wire:model.defer="state.bio"
                                                                class="form-control @error('bio') is-invalid @enderror"
                                                                rows="5"
                                                                placeholder="About">{{ old('bio') }}</textarea>
                                                            @error('bio')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="inputFirstName">New
                                                            Password</label>
                                                        <input
                                                            class="form-control @error('password') is-invalid @enderror"
                                                            wire:model.defer="state.password" id="password"
                                                            type="password" placeholder="Enter New Password"
                                                            name="password">
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="small mb-1" for="inputLastName">Confirm
                                                            Password</label>
                                                        <input
                                                            class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                            wire:model.defer="state.password_confirmation"
                                                            id="password_confirmation" type="password"
                                                            placeholder="Confirm New Password"
                                                            name="password_confirmation">
                                                        @error('password_confirmation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col d-flex">
                                                <!-- Save changes button-->
                                                <button wire:click="Create()" wire:loading.attr="disabled"
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
@else
    <div class="container-fluid">
        <div class="alert alert-danger  text-center" role="alert">
            <h4 class="alert-heading">
                <i class="fas fa-exclamation-triangle fa-5x"></i>
            </h4>
            <strong class="mt-2">
                You are not allowed to Create a Client.Please check your Abilities <a
                    href="{{ route('BusinessPermissions') }}">Here</a>
            </strong>
        </div>
    </div>
@endif
