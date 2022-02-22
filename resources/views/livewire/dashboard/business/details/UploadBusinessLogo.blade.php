<div class="row">
    <div class="col-12 col-sm-auto mb-3">
        <div class="mx-auto" style="width: 140px;">
            <div id="business_avatar"
            class="d-flex justify-content-center align-items-center rounded"
            style="height: 140px; background-color: rgb(233, 236, 239); cursor: pointer;">

            @if(!Business::Is(Auth::user()->id))
            <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
            @else

            @if($business_avatar)
            <img style="width:100%;" src="{{ asset($business_avatar->temporaryUrl())}}" alt="business_avatar">
            @else

            @if(!is_null($business_avatar = Business::Is(Auth::user()->id)->business_avatar))
            <img style="width:100%;" src="{{ asset('dashboard/images/business/businesslogos/'.$business_avatar)}}" alt="Logo">
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
            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! Auth::user()->business_name !!}</h4>
            <p class="mb-0">
                <a class="text-muted" href=" {{ route('ViewBusiness', Auth::user()->business_user_name) }}">
                    {{ __('@' . Auth::user()->business_user_name) }}
                    <button class="ml-2" style="border:none; padding:0px; background-color:transparent;"
                        type="button">
                        <span class="badge badge-primary">
                            <i class="fa fa-fw fa-eye"></i>
                            View as Public
                        </span>
                    </button>
                </a>
            </p>
            <div class="mt-2">
                <span class="text-muted">
                    Your Clients can use this Link
                    <strong class="text-primary" style="text-decoration: underline;">
                        {{ route('RegisterAsClient', Auth::user()->business_user_name) }}
                    </strong>
                    to register.
                </span>
            </div>
            <div class="mt-3">
                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <input style="display:none;" wire:model.defer="business_avatar" id="uploadbusiness_avatar" type="file">
                    <!-- Progress Bar -->
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
                @if ($business_avatar)
                    <button wire:click="Upload()" style="border:none; padding:0px; background-color:transparent;"
                        type="button">
                        <span class="badge badge-primary">
                            <span wire:loading wire:target='Upload' class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>
                            <i class="fa fa-fw fa-camera"></i>
                            Upload
                        </span>
                    </button>
                @endif
                @if (!Business::Is(Auth::user()->id))
                    <button wire:click="Remove()" style="border:none; padding:0px; background-color:transparent;"
                        type="button">
                        <span class="badge badge-danger">
                            <span wire:loading wire:target='Remove' class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true"></span>
                            <i class="fa fa-fw fa-trash"></i>
                            Remove
                        </span>
                    </button>
                @else
                    @if ($business_avatar)
                        <button wire:click="Remove()" style="border:none; padding:0px; background-color:transparent;"
                            type="button">
                            <span class="badge badge-danger">
                                <span wire:loading wire:target='Remove' class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                                <i class="fa fa-fw fa-trash"></i>
                                Remove
                            </span>
                        </button>
                    @endif
                @endif
            </div>
        </div>
        <div class="text-center text-sm-right">
            <span class="badge badge-primary">{{ ucfirst(Auth::user()->role) }} Account</span>
            <div class="text-muted"><small>Joined
                    {{ date('d M Y', strtotime(Auth::user()->created_at)) }}</small>
            </div>
        </div>
    </div>
</div>
