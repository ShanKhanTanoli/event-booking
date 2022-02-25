<div class="row">
    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
        <div class="text-center text-sm-left mb-2 mb-sm-0">
            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! $business->name !!}</h4>
            <p class="mb-0">
                @if(!is_null( $business->business_user_name))
                <span class="text-muted">
                    {{ __('@' . $business->business_user_name) }}
                </span>
                @else
                <span class="text-muted">
                    {{ __('@ Set Business Username') }}
                </span>
                @endif
            </p>
            <div class="mt-3">
                @if (Admin::BusinessIsVerified($business->id))
                    <button wire:click="UnVerifyEmail({{ $business->id }})"
                        style="padding:0px; border:none; background-color:transparent">
                        <span class="badge badge-danger">
                            <i class="fas fa-user-alt-slash"></i>
                            <span wire:loading wire:target='UnVerifyEmail({{ $business->id }})'
                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
                            Unverify
                        </span>
                    </button>
                @else
                    <button wire:click="VerifyEmail({{ $business->id }})"
                        style="padding:0px; border:none; background-color:transparent">
                        <span class="badge badge-primary">
                            <i class="fas fa-user-check"></i>
                            <span wire:loading wire:target='VerifyEmail({{ $business->id }})'
                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
                            Verify Now
                        </span>
                    </button>
                @endif
                @if ($business->trashed())
                    <button wire:click="ActivateNow({{ $business->id }})"
                        style="padding:0px; border:none; background-color:transparent">
                        <span class="badge badge-primary">
                            <i class="fas fa-check"></i>
                            <span wire:loading wire:target='ActivateNow({{ $business->id }})'
                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
                            Activate
                        </span>
                    </button>
                @else
                    <button wire:click="BanNow({{ $business->id }})"
                        style="padding:0px; border:none; background-color:transparent">
                        <span class="badge badge-danger">
                            <i class="fas fa-ban"></i>
                            <span wire:loading wire:target='BanNow({{ $business->id }})'
                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                            </span>
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
