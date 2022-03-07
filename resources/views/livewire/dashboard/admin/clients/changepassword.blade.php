<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <!--Begin::Sidebar-->
        @include('livewire.dashboard.admin.clients.partials.sidebar')
        <!--Begin::Sidebar-->
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <div class="col p-0">
                                    {!! $client->name  !!} Password
                                </div>
                                <div class="col text-right p-0">
                                    <a href="{{ route('AdminClients') }}"
                                        style="border:none; padding:0px; background-color:transparent;" type="button">
                                        <span class="badge badge-primary">
                                            <i class="fa fa-fw fa-users"></i>
                                            View Clients
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form" novalidate="">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input wire:model.defer="state.password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" type="password" placeholder="Enter Password"
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
                                        <!-- Save changes button-->
                                        <button wire:click="Update()" wire:loading.attr="disabled"
                                            class="btn btn-primary" type="button">
                                            <span wire:loading wire:target='Update'
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
