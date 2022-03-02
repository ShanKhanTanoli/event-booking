<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <!--Begin::Reservations Info-->
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
                </div>
            </div>
        </div>
    </div>
    <!--Begin::Reservations Info-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!--Begin::Slots-->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" cellspacing="0"
                                        role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Capacity</th>
                                                <th class="text-center">Booked</th>
                                                <th class="text-center" colspan="2">Actions</th>
                                            </tr>
                                        </thead>
                                        @foreach ($slots as $slot)
                                        @if (Slot::CanBeBooked($slot->id))
                                            <tr>
                                                <td class="text-center">
                                                    <strong>
                                                        {{ date('D d M Y', strtotime($slot->starting_date)) }}
                                                    </strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong>
                                                        {{ date('h:i A', strtotime($slot->starting_time)) }}
                                                    </strong>
                                                    -
                                                    <strong>
                                                        {{ date('h:i A', strtotime($slot->ending_time)) }}
                                                    </strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong>
                                                        {{ $slot->capacity }}
                                                    </strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong>
                                                        {{ number_format(Slot::CountBookings($slot->id)) }}
                                                    </strong>
                                                </td>
                                                <td class="text-center">
                                                    @if (Slot::CanBeBooked($slot->id))
                                                    @if (Booking::is_booked(Auth::user()->id, $slot->id))
                                                        <button wire:click="BookNow({{ $slot->id }})" wire:loading.attr='disabled'
                                                            style="padding:0px; border:none; background-color:transparent">
                                                            <span class="badge badge-primary">
                                                                <span wire:loading wire:target='BookNow({{ $slot->id }})'
                                                                    class="spinner-border spinner-border-sm" role="status"
                                                                    aria-hidden="true"></span>
                                                                <i class="fas fa-plus"></i> Book
                                                            </span>
                                                        </button>
                                                    @else
                                                        <button wire:click="CancelNow({{ $slot->id }})" wire:loading.attr='disabled'
                                                            style="padding:0px; border:none; background-color:transparent">
                                                            <span class="badge badge-danger">
                                                                <span wire:loading wire:target='CancelNow({{ $slot->id }})'
                                                                    class="spinner-border spinner-border-sm" role="status"
                                                                    aria-hidden="true"></span>
                                                                <i class="fas fa-minus"></i>
                                                                Cancel
                                                            </span>
                                                        </button>
                                                    @endif
                                                    @else
                                                    <button class="btn btn-danger"style="padding:0px; border:none; background-color:transparent" disabled>
                                                        <span class="badge badge-danger">
                                                            <i class="fas fa-plus"></i> Book
                                                        </span>
                                                    </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 mt-2 mb-2 text-center">
                                    <button wire:click='LoadMore' wire:loading.attr='disabled'
                                        class="btn btn-sm btn-primary">
                                        <span wire:loading wire:target='LoadMore'
                                            class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Load More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End::Slots-->
        </div>
    </div>
</div>
