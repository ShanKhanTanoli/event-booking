<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <!--Begin::Sidebar-->
        @include('livewire.dashboard.admin.business.partials.sidebar')
        <!--Begin::Sidebar-->
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            Update {!! $business->name  !!} Profile
                        </div>
                        <div class="card-body">
                            <!--Begin::Business Actions-->
                            @include('livewire.dashboard.admin.business.partials.business-actions')
                            <!--End::Business Actions-->
                            <form class="form" novalidate="">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input wire:model.defer="state.name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                type="text" placeholder="John Smith" value="{{ $business->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input wire:model.defer="state.user_name"
                                                class="form-control @error('user_name') is-invalid @enderror" id="user_name"
                                                type="text" placeholder="John Smith" value="{{ $business->user_name }}">
                                            @error('user_name')
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
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                type="email" placeholder="user@example.com"
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
                                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                type="text" placeholder="XXXXXXXXXXXX" value="{{ $business->phone }}">
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
                                                class="form-control @error('address') is-invalid @enderror" rows="5"
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
                                                class="form-control @error('bio') is-invalid @enderror" rows="5"
                                                placeholder="My Bio">{{ $business->bio }}</textarea>
                                            @error('bio')
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
                                        <button wire:click="Update()" wire:loading.attr='disabled'
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
        </div>
    </div>
</div>
