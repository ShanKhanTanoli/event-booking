<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if ($business = Client::JoinedBusiness(Auth::user()->id))
        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                <!-- Account details card-->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        My Reservations
                    </div>
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
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (Client::CountBookings(Auth::user()->id) > 0)
                                                    @foreach ($slots as $slot)
                                                    @if(Slot::ReservationIsActive($slot->reservation_id))
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
                                                                <strong>
                                                                    @if (Slot::BookingStatusOfClient($slot->id, Auth::user()->id) == 'BOOKED')
                                                                        <span class="badge badge-primary">
                                                                            Booked
                                                                        </span>
                                                                    @else
                                                                        <span class="badge badge-danger">
                                                                            {{ Slot::BookingStatusOfClient($slot->id, Auth::user()->id) }}
                                                                        </span>
                                                                    @endif
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                @if (Slot::CanBeBooked($slot->id))
                                                                    @if (Booking::is_booked(Auth::user()->id, $slot->id))
                                                                        <button
                                                                            wire:click="BookNow({{ $slot->id }})"
                                                                            wire:loading.attr='disabled'
                                                                            style="padding:0px; border:none; background-color:transparent">
                                                                            <span class="badge badge-primary">
                                                                                <span wire:loading
                                                                                    wire:target='BookNow({{ $slot->id }})'
                                                                                    class="spinner-border spinner-border-sm"
                                                                                    role="status"
                                                                                    aria-hidden="true"></span>
                                                                                <i class="fas fa-plus"></i> Book
                                                                            </span>
                                                                        </button>
                                                                    @else
                                                                        <button
                                                                            wire:click="CancelNow({{ $slot->id }})"
                                                                            wire:loading.attr='disabled'
                                                                            style="padding:0px; border:none; background-color:transparent">
                                                                            <span class="badge badge-danger">
                                                                                <span wire:loading
                                                                                    wire:target='CancelNow({{ $slot->id }})'
                                                                                    class="spinner-border spinner-border-sm"
                                                                                    role="status"
                                                                                    aria-hidden="true"></span>
                                                                                <i class="fas fa-minus"></i>
                                                                                Cancel
                                                                            </span>
                                                                        </button>
                                                                    @endif
                                                                @else
                                                                    <button class="btn btn-danger"
                                                                        style="padding:0px; border:none; background-color:transparent"
                                                                        disabled>
                                                                        <span class="badge badge-danger">
                                                                            <i class="fas fa-plus"></i> Book
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @else
                                                        <tr class="text-center">
                                                            <td colspan="11">
                                                                <strong>
                                                                    No Data Found
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <tr class="text-center">
                                                        <td colspan="11">
                                                            <strong>
                                                                No Data Found
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @if (Client::CountBookings(Auth::user()->id) != $slots->count())
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 mt-2 mb-2 text-center">
                                            <button wire:click='LoadMore' class="btn btn-sm btn-primary">
                                                <span wire:loading wire:target='LoadMore'
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Load More
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row justify-content-center align-align-items-center">
                <div class="col-xl-12">
                    <div class="alert alert-danger  text-center" role="alert">
                        <h4 class="alert-heading mb-5">
                            <i class="fas fa-exclamation-triangle fa-5x"></i>
                        </h4>
                        <strong class="mt-5">
                            You did not Join any Business Or Business Owner removed you from his/her Business.
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
