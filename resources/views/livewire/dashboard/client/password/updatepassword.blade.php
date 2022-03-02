<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Current Password</label>
                            <input class="form-control @error('current_password') is-invalid @enderror"
                                wire:model.defer="state.current_password" id="current_password" type="password"
                                placeholder="Enter your Current Password" name="current_password">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">New Password</label>
                                <input class="form-control @error('password') is-invalid @enderror"
                                    wire:model.defer="state.password" id="password" type="password"
                                    placeholder="Enter your New Password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Confirm Password</label>
                                <input class="form-control  @error('password_confirmation') is-invalid @enderror"
                                    wire:model.defer="state.password_confirmation" id="password_confirmation"
                                    type="password" placeholder="Confirm your New Password"
                                    name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button wire:click="Update()" wire:loading.attr='disabled' class="btn btn-primary"
                            type="button">
                            <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            Update Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
