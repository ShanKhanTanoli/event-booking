<div class="row">
    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
        <div class="text-center text-sm-left mb-2 mb-sm-0">
            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! $business->name !!}</h4>
            <p class="mb-0">
                <span class="text-muted">
                    {{ __('@' . $business->user_name) }}
                </span>
            </p>
            <div class="mt-3">
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
