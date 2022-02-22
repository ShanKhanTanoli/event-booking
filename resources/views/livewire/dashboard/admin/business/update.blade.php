<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <!--Begin::Sidebar-->
        @include('livewire.dashboard.admin.business.sidebar')
        <!--Begin::Sidebar-->
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded"
                                                style="height: 140px; background-color: rgb(233, 236, 239);">
                                                <span
                                                    style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! $business->name !!}</h4>
                                            <p class="mb-0">
                                                <span class="text-muted">
                                                    {{ __('@' . $business->user_name) }}
                                                </span>
                                            </p>
                                            <div class="mt-3">
                                                <button style="border:none; padding:0px; background-color:transparent;"
                                                    type="button">
                                                    <span class="badge badge-primary">
                                                        <i class="fas fa-fw fa-camera"></i>
                                                        Change
                                                    </span>
                                                </button>
                                                <button style="border:none; padding:0px; background-color:transparent;"
                                                    type="button">
                                                    <span class="badge badge-danger">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        Remove
                                                    </span>
                                                </button>
                                                @if (Admin::BusinessIsVerified($business->id))
                                                    <button wire:click="UnVerifyEmail({{ $business->id }})"
                                                        style="padding:0px; border:none; background-color:transparent">
                                                        <span class="badge badge-danger">
                                                            Unverify
                                                        </span>
                                                    </button>
                                                @else
                                                    <button wire:click="VerifyEmail({{ $business->id }})"
                                                        style="padding:0px; border:none; background-color:transparent">
                                                        <span class="badge badge-primary">
                                                            Verify Now
                                                        </span>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center text-sm-right">
                                            @if (Admin::BusinessIsVerified($business->id))
                                                <span class="badge badge-primary">
                                                    <i class="fas fa-check"></i> Verified
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    <i class="fas fa-ban"></i> Unverified
                                                </span>
                                            @endif
                                            <span class="badge badge-primary">{{ ucfirst($business->role) }}</span>
                                            <div class="text-muted"><small>Joined
                                                    {{ date('d M Y', strtotime($business->created_at)) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
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
                                                                    value="{{ $business->name }}">
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
                                                                    id="email" type="email"
                                                                    placeholder="user@example.com"
                                                                    value="{{ $business->email }}">
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
                                                                    value="{{ $business->phone }}">
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
                                                                    placeholder="Address">{{ $business->address }}</textarea>
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
                                                                    placeholder="My Bio">{{ $business->bio }}</textarea>
                                                                @error('bio')
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
                                                    <button wire:click="Update()" class="btn btn-primary" type="button">
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
