<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <!--Begin::Upload Business Logo-->
                                @include('livewire.dashboard.business.details.UploadBusinessLogo')
                                <!--End::Upload Business Logo-->
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
                                                                    id="business_name" type="text"
                                                                    placeholder="e.g CoolGym"
                                                                    value="{{ Auth::user()->business_name }}">
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
                                                                    id="business_user_name" type="text"
                                                                    placeholder="e.g CoolGym"
                                                                    value="{{ Auth::user()->business_user_name }}">
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
                                                                    id="business_email" type="email "
                                                                    placeholder="business@example.com"
                                                                    value="{{ Auth::user()->business_email }}">
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
                                                                    value="{{ Auth::user()->business_phone }}">
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
                                                                    placeholder="Business Address">{{ Auth::user()->business_address }}</textarea>
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
                                                                <label>Business Description</label>
                                                                <textarea wire:model.defer="state.business_bio"
                                                                    class="form-control @error('business_bio') is-invalid @enderror"
                                                                    rows="5"
                                                                    placeholder="Business Description">{{ Auth::user()->business_bio }}</textarea>
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
                                                    <button wire:click="Update()" wire:loading.attr='disabled' class="btn btn-primary" type="button">
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
