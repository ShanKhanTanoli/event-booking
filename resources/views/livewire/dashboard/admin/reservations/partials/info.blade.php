<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card border-left-primary shadow mb-2">
            <div class="card-body d-flex">
                <div class="col p-0">
                    <strong>
                        {!! substr($reservation->name, 0, 30) !!}
                        (Total {{ number_format(Business::CountSlots($reservation->id)) }} Slots)
                    </strong>
                </div>
                <div class="col p-0" style="text-align:right;">
                    @if ($reservation->status == 'banned')
                        <button wire:click="UnBan({{ $reservation->id }})" wire:loading.attr='disabled'
                            style="padding:0px; border:none; background-color:transparent">
                            <span class="badge badge-primary">
                                <span wire:loading wire:target='UnBan({{ $reservation->id }})'
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <i class="fas fa-check"></i> UnBan
                            </span>
                        </button>
                    @else
                        <button wire:click="BanNow({{ $reservation->id }})" wire:loading.attr='disabled'
                            style="padding:0px; border:none; background-color:transparent">
                            <span class="badge badge-danger">
                                <span wire:loading wire:target='BanNow({{ $reservation->id }})'
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <i class="fas fa-ban"></i> Ban
                            </span>
                        </button>
                    @endif
                    @if ($reservation->status == 'active')
                        <button wire:click="Archive({{ $reservation->id }})" wire:loading.attr='disabled'
                            style="padding:0px; border:none; background-color:transparent">
                            <span class="badge badge-danger">
                                <span wire:loading wire:target='Archive({{ $reservation->id }})'
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <i class="fas fa-archive"></i> Archive
                            </span>
                        </button>
                    @endif
                    @if ($reservation->status == 'archived')
                        <button wire:click="Activate({{ $reservation->id }})" wire:loading.attr='disabled'
                            style="padding:0px; border:none; background-color:transparent">
                            <span class="badge badge-primary">
                                <span wire:loading wire:target='Activate({{ $reservation->id }})'
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <i class="fas fa-check"></i> Activate
                            </span>
                        </button>
                    @endif
                    <button wire:click="Edit({{ $reservation->id }})" wire:loading.attr='disabled'
                        style="padding:0px; border:none; background-color:transparent">
                        <span class="badge badge-primary">
                            <span wire:loading wire:target='Edit({{ $reservation->id }})'
                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <i class="fas fa-edit"></i> Edit
                        </span>
                    </button>
                    <button wire:click="RequestDelete({{ $reservation->id }})" wire:loading.attr='disabled'
                        style="padding:0px; border:none; background-color:transparent">
                        <span class="badge badge-danger">
                            <span wire:loading wire:target='RequestDelete({{ $reservation->id }})'
                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <i class="fas fa-trash-alt"></i> Delete
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
