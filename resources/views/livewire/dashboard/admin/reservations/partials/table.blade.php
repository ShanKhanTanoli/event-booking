@foreach ($reservations as $reservation)
    <div class="card shadow mb-4">
        <div class="card-header d-flex">
            <div class="col p-0">
                <strong>
                    {!! substr($reservation->name, 0, 30) !!}
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
        <!--Begin::Slots-->
        @include('livewire.dashboard.admin.reservations.partials.slots')
        <!--End::Slots-->
    </div>
@endforeach
<div class="row">
    <div class="col-sm-12 col-md-12 mt-2 mb-2 text-center">
        <button wire:click='LoadMore' wire:loading.attr='disabled' class="btn btn-sm btn-primary">
            <span wire:loading wire:target='LoadMore' class="spinner-border spinner-border-sm" role="status"
                aria-hidden="true"></span>
            Load More
        </button>
    </div>
</div>
