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
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div id="logo"
                                                class="d-flex justify-content-center align-items-center rounded"
                                                style="height: 140px; background-color: rgb(233, 236, 239); cursor: pointer;">
                                                @if (!Admin::Settings())
                                                    <span
                                                        style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                @else
                                                    @if ($logo)
                                                        <img style="width:100%;"
                                                            src="{{ asset($logo->temporaryUrl()) }}" alt="Logo">
                                                    @else
                                                        @if (!is_null($logo = Admin::Settings()->logo))
                                                            <img style="width:100%;"
                                                                src="{{ asset('dashboard/images/admin/logos/' . $logo) }}"
                                                                alt="Logo">
                                                        @else
                                                            <span
                                                                style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                        @endif
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                            <div class="mt-1">
                                                <div x-data="{ isUploading: false, progress: 0 }"
                                                    x-on:livewire-upload-start="isUploading = true"
                                                    x-on:livewire-upload-finish="isUploading = false"
                                                    x-on:livewire-upload-error="isUploading = false"
                                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                    <!-- File Input -->
                                                    <input style="display:none;" wire:model.defer="logo" id="uploadlogo"
                                                        type="file">
                                                    <!-- Progress Bar -->
                                                    <div x-show="isUploading">
                                                        <progress max="100" x-bind:value="progress"></progress>
                                                    </div>
                                                </div>
                                                <button wire:click="Upload()"
                                                    style="border:none; padding:0px; background-color:transparent;"
                                                    type="button">
                                                    <span class="badge badge-primary">
                                                        <span wire:loading wire:target='Upload'
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        <i class="fas fa-fw fa-camera"></i>
                                                        Upload
                                                    </span>
                                                </button>
                                                @if (!Admin::Settings())
                                                    <button wire:click="Remove()"
                                                        style="border:none; padding:0px; background-color:transparent;"
                                                        type="button">
                                                        <span class="badge badge-danger">
                                                            <span wire:loading wire:target='Remove'
                                                                class="spinner-border spinner-border-sm" role="status"
                                                                aria-hidden="true"></span>
                                                            <i class="fa fa-fw fa-trash"></i>
                                                            Remove
                                                        </span>
                                                    </button>
                                                @else
                                                    @if ($logo)
                                                        <button wire:click="Remove()"
                                                            style="border:none; padding:0px; background-color:transparent;"
                                                            type="button">
                                                            <span class="badge badge-danger">
                                                                <span wire:loading wire:target='Remove'
                                                                    class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                <i class="fa fa-fw fa-trash"></i>
                                                                Remove
                                                            </span>
                                                        </button>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <div class="mt-1">
                                                    @error('logo')
                                                        <strong class="text-danger">{{ $message }}</strong>
                                                    @enderror
                                                </div>
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
                                                                <label>Text Logo (It will be used as your logo If you
                                                                    will not upload logo)</label>
                                                                <input wire:model.defer="text_logo"
                                                                    class="form-control @error('text_logo') is-invalid @enderror"
                                                                    id="text_logo " type="text"
                                                                    placeholder="e.g Your Brand Name"
                                                                    value="{{ old('text_logo') }}">
                                                                @error('text_logo')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Commission Percentage % (When clients will pay to their business
                                                                    owners)</label>
                                                                <input wire:model.defer="commission_percentage"
                                                                    class="form-control @error('commission_percentage') is-invalid @enderror"
                                                                    id="commission_percentage " type="text"
                                                                    placeholder="Commsission Percentage %"
                                                                    value="{{ old('commission_percentage') }}">
                                                                @error('commission_percentage')
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
                                                    <button wire:click="Update()" wire:loading.attr='disabled'
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
        </div>
    </div>
</div>
