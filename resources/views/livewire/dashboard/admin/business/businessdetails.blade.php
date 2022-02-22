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
                                                @if ($business->trashed())
                                                    <button wire:click="ActivateNow({{ $business->id }})"
                                                        style="padding:0px; border:none; background-color:transparent">
                                                        <span class="badge badge-primary">
                                                            Activate
                                                        </span>
                                                    </button>
                                                @else
                                                    <button wire:click="BanNow({{ $business->id }})"
                                                        style="padding:0px; border:none; background-color:transparent">
                                                        <span class="badge badge-danger">
                                                            Ban Now
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
                                            @if ($business->trashed())
                                                <span class="badge badge-danger">
                                                    <i class="fas fa-ban"></i> Banned
                                                </span>
                                            @else
                                                <span class="badge badge-primary">
                                                    <i class="fas fa-check"></i> Active
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
                                                                <label>Business Name</label>
                                                                <input wire:model.defer="state.business_name"
                                                                    class="form-control @error('business_name') is-invalid @enderror"
                                                                    id="business_name" type="text" placeholder="Business Name"
                                                                    value="{{ $business->business_name }}">
                                                                @error('business_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Business Username</label>
                                                                <input wire:model.defer="state.business_user_name"
                                                                    class="form-control @error('business_user_name') is-invalid @enderror"
                                                                    id="business_user_name" type="text" placeholder="johnny.s"
                                                                    value="{{ $business->business_user_name }}">
                                                                @error('business_user_name')
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
                                                                <label>Business Email</label>
                                                                <input wire:model.defer="state.business_email"
                                                                    class="form-control @error('business_email') is-invalid @enderror"
                                                                    id="business_email" type="business_email"
                                                                    placeholder="user@example.com"
                                                                    value="{{ $business->business_email }}">
                                                                @error('business_email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Business Phone</label>
                                                                <input wire:model.defer="state.business_phone"
                                                                    class="form-control @error('business_phone') is-invalid @enderror"
                                                                    id="business_phone" type="text"
                                                                    placeholder="XXXXXXXXXXXX"
                                                                    value="{{ $business->business_phone }}">
                                                                @error('business_phone')
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
                                                                <label>Business Address</label>
                                                                <textarea wire:model.defer="state.business_address"
                                                                    class="form-control @error('business_address') is-invalid @enderror"
                                                                    rows="5"
                                                                    placeholder="Business Address">{{ $business->business_address }}</textarea>
                                                                @error('business_address')
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
                                                                <label>Business Bio</label>
                                                                <textarea wire:model.defer="state.business_bio"
                                                                    class="form-control @error('business_bio') is-invalid @enderror"
                                                                    rows="5"
                                                                    placeholder="Business Bio">{{ $business->business_bio }}</textarea>
                                                                @error('business_bio')
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
