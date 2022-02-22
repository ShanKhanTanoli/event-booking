<div class="row">
    <div class="col-12 col-sm-auto mb-3">
        <div class="mx-auto" style="width: 140px;">
            <div id="avatar"
            class="d-flex justify-content-center align-items-center rounded"
            style="height: 140px; background-color: rgb(233, 236, 239); cursor: pointer;">

            @if(!Admin::CheckClient($client->id))
            <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
            @else

            @if($avatar)
            <img style="width:100%;" src="{{ asset($avatar->temporaryUrl())}}" alt="avatar">
            @else

            @if(!is_null($avatar = Admin::CheckClient($client->id)->avatar))
            <img style="width:100%;" src="{{ asset('dashboard/images/client/avatars/'.$avatar)}}" alt="Logo">
            @else
            <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
            @endif

            @endif

            @endif
        </div>
        </div>
    </div>
    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
        <div class="text-center text-sm-left mb-2 mb-sm-0">
            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! $client->name !!}</h4>
            <p class="mb-0">
                <span class="text-muted">
                    {{ __('@' . $client->user_name) }}
                </span>
            </p>
            <div class="mt-1">
                <div class="text-center">
                    @error('avatar')
                    <strong class="text-danger">{{ $message }}</strong>
                @enderror
                </div>
            </div>
            <div class="mt-2">
                <div x-data="{ isUploading: false, progress: 0 }"
                x-on:livewire-upload-start="isUploading = true"
                x-on:livewire-upload-finish="isUploading = false"
                x-on:livewire-upload-error="isUploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <!-- File Input -->
                <input style="display:none;" wire:model.defer="avatar" id="uploadavatar"
                    type="file">
                <!-- Progress Bar -->
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>
            </div>
            <div class="mt-1">
                @if($avatar)
                <button wire:click="Upload({{ $client->id }})"
                    style="border:none; padding:0px; background-color:transparent;"
                    type="button">
                    <span class="badge badge-primary">
                        <span wire:loading wire:target='Upload({{ $client->id }})'
                            class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                        <i class="fa fa-fw fa-camera"></i>
                        Upload
                    </span>
                </button>
                @endif
                @if(!Admin::CheckClient($client->id))
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
                    @if ($avatar)
                        <button wire:click="Remove({{ $client->id }})"
                            style="border:none; padding:0px; background-color:transparent;"
                            type="button">
                            <span class="badge badge-danger">
                                <span wire:loading wire:target='Remove({{ $client->id }})'
                                    class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                                <i class="fa fa-fw fa-trash"></i>
                                Remove
                            </span>
                        </button>
                    @endif
                @endif
                @if (Admin::ClientIsVerified($client->id))
                    <button wire:click="UnVerifyEmail({{ $client->id }})"
                        style="padding:0px; border:none; background-color:transparent">
                        <span class="badge badge-danger">
                            Unverify
                        </span>
                    </button>
                @else
                    <button wire:click="VerifyEmail({{ $client->id }})"
                        style="padding:0px; border:none; background-color:transparent">
                        <span class="badge badge-primary">
                            Verify Now
                        </span>
                    </button>
                @endif
            </div>
        </div>
        <div class="text-center text-sm-right">
            @if (Admin::ClientIsVerified($client->id))
                <span class="badge badge-primary">
                    <i class="fas fa-check"></i> Verified
                </span>
            @else
                <span class="badge badge-danger">
                    <i class="fas fa-ban"></i> Unverified
                </span>
            @endif
            <span class="badge badge-primary">{{ ucfirst($client->role) }}</span>
            <div class="text-muted"><small>Joined
                    {{ date('d M Y', strtotime($client->created_at)) }}</small>
            </div>
        </div>
    </div>
</div>
