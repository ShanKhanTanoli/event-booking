<table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid"
    aria-describedby="dataTable_info" style="width: 100%;">
    <thead>
        <tr role="row">
            <th>Name</th>
            <th class="text-center">Date</th>
            <th class="text-center">Time</th>
            <th class="text-center">Capacity</th>
            <th class="text-center">Booked</th>
            <th class="text-center" colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach (Business::Slots($reservation->id) as $slot)
            @if (Slot::CanBeBooked($slot->id))
                <tr>
                    <td>
                        <strong>
                            @if (strlen($slot->name) > 25)
                                {!! substr($slot->name, 0, 25) !!}...
                            @else
                                {!! substr($slot->name, 0, 30) !!}
                            @endif
                        </strong>
                    </td>
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
                            <button class="btn btn-danger"
                                style="padding:0px; border:none; background-color:transparent" disabled>
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
