<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Update Stripe Credentials</div>
                <div class="card-body">
                    <form>
                        @if (!is_null($stripe))
                            <!-- Form Group (public_key)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="public_key">Publishable Key (Enter Public/Publishable
                                    Key)</label>
                                <input class="form-control @error('public_key') is-invalid @enderror"
                                    wire:model.defer="state.public_key" id="public_key" type="text"
                                    placeholder="Enter Public Key" name="public_key">
                                @error('public_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (secret_key)-->
                                <div class="col-md-9">
                                    <label class="small mb-1" for="secret_key">Secret Key (Enter Secret Key)</label>
                                    <input class="form-control @error('secret_key') is-invalid @enderror"
                                        wire:model.defer="state.secret_key" id="secret_key" type="text"
                                        placeholder="Enter Secret Key" name="secret_key">
                                    @error('secret_key')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-3">
                                    <label class="small mb-1" for="inputLastName">Payment Mode</label>
                                    <select wire:model.defer="state.payment_mode"
                                        class="form-control @error('payment_mode') is-invalid @enderror">
                                        <option value="[]">Select Payment Mode</option>
                                        @if ($stripe->payment_mode == 'test')
                                            <option selected value="test">Test Mode</option>
                                        @else
                                            <option value="test">Test Mode</option>
                                        @endif

                                        @if ($stripe->payment_mode == 'live')
                                            <option selected value="live">Live Mode</option>
                                        @else
                                            <option value="live">Live Mode</option>
                                        @endif

                                    </select>
                                    @error('payment_mode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Save changes button-->
                            <button wire:click="Update()" class="btn btn-primary" type="button">
                                <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                    aria-hidden="true"></span>
                                Save Changes </button> &nbsp;
                        @else

                            <!-- Form Group (public_key)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="public_key">Publishable Key (Enter Public/Publishable
                                    Key)</label>
                                <input class="form-control @error('public_key') is-invalid @enderror"
                                    wire:model.defer="state.public_key" id="public_key" type="text"
                                    placeholder="Enter Public Key" name="public_key">
                                @error('public_key')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (secret_key)-->
                                <div class="col-md-9">
                                    <label class="small mb-1" for="secret_key">Secret Key (Enter Secret Key)</label>
                                    <input class="form-control @error('secret_key') is-invalid @enderror"
                                        wire:model.defer="state.secret_key" id="secret_key" type="text"
                                        placeholder="Enter Secret Key" name="secret_key">
                                    @error('secret_key')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-3">
                                    <label class="small mb-1" for="inputLastName">Payment Mode</label>
                                    <select wire:model.defer="state.payment_mode"
                                        class="form-control @error('payment_mode') is-invalid @enderror">
                                        <option value="[]">Select Payment Mode</option>
                                        <option value="test">Test Mode</option>
                                        <option value="live">Live Mode</option>
                                    </select>
                                    @error('payment_mode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Create new button-->
                            <button wire:click="Create()" class="btn btn-primary" type="button">
                                <span wire:loading wire:loading.target="Create()"
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Create New </button> &nbsp;
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
