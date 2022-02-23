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
                            Add New Business Account
                        </div>
                        <div class="card-body">
                            <div class="tab-content pt-3">
                                <div class="tab-pane active">
                                    <form class="form" novalidate="">
                                        <input type="hidden" wire:model.defer="state.role" value="business">
                                        <input type="hidden" wire:model.defer="state.role_id" value="2">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Full Name</label>
                                                            <input wire:model.defer="state.name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                id="name" type="text" placeholder="Business Name"
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
                                                                placeholder="Bio">{{ old('bio') }}</textarea>
                                                            @error('bio')
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
                                                            <label>Password</label>
                                                            <input wire:model.defer="state.password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                id="password" type="password" placeholder="Password"
                                                                value="{{ old('password') }}">
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Confirm Password</label>
                                                            <input wire:model.defer="state.password_confirmation"
                                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                id="password_confirmation" type="password"
                                                                placeholder="Confirm Password"
                                                                value="{{ old('password_confirmation') }}">
                                                            @error('password_confirmation')
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
                                                <!-- Add Business Account button-->
                                                <button wire:click="AddBusinessAccount()" class="btn btn-primary"
                                                    type="button">
                                                    <span wire:loading class="spinner-border spinner-border-sm"
                                                        role="status" aria-hidden="true"></span>
                                                    Add Business Account
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
