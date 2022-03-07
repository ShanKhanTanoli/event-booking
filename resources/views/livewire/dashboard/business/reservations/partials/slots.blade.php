@if (Business::Slots($reservation->id)->count() > 0)
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid"
                            aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Time</th>
                                    <th class="text-center">Capacity</th>
                                    <th class="text-center">Booked</th>
                                    <th class="text-center">Bookings</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Business::Slots($reservation->id) as $slot)
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
                                                {{ number_format($slot->capacity) }}
                                            </strong>
                                        </td>
                                        <td class="text-center">
                                            <strong>
                                                {{ number_format(Slot::CountBookings($slot->id)) }}
                                            </strong>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('BusinessViewReservationBookings',$slot->slug) }}" style="padding:0px; border:none; background-color:transparent">
                                                <span class="badge badge-primary">
                                                    <i class="fas fa-eye"></i>
                                                    View
                                                </span>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <button wire:click="DeleteSlot({{ $slot->id }})"
                                                wire:loading.attr='disabled'
                                                style="padding:0px; border:none; background-color:transparent">
                                                <span class="badge badge-danger">
                                                    <span wire:loading wire:target='DeleteSlot({{ $slot->id }})'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a href="{{ route('BusinessViewReservationSlots', $reservation->slug) }}"
                            class="btn btn-primary btn-sm">
                            View Slots
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="card-body">
        <div class="text-center">
            <strong class="text-danger">
                You don't have any slots yet.Create some slots.
            </strong>
        </div>
    </div>
@endif
