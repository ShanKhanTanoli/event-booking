<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if (Business::CanViewReservations(Auth::user()->id))

    @if(Slot::ReservationIsActive($slot->reservation_id))
    <!--Begin::Create Booking Modal-->
    @include('livewire.dashboard.business.reservations.slots.bookings.partials.create-booking')
    <!--Begin::Create Booking Modal-->
    @else
    <div class="alert alert-danger">
        <strong>
            This reservation is not active.
        </strong>
    </div>
    @endif

        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                <!--Begin::Slots-->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="col">
                                <strong>
                                    Total Bookings ({{ Slot::CountBookings($slot->id) }}) - Capacity ({{ $slot->capacity }})
                                </strong>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('BusinessReservations') }}" style="padding:0px; border:none; background-color:transparent">
                                    <span class="badge badge-primary">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        View Reservations
                                    </span>
                                </a>
                                @if(Slot::ReservationIsActive($slot->reservation_id))
                                <button data-toggle="modal" data-target="#create-booking"
                                    style="padding:0px; border:none; background-color:transparent">
                                    <span class="badge badge-primary">
                                        <i class="fas fa-plus"></i> Create Booking
                                    </span>
                                </button>
                                @else
                                <button disabled style="padding:0px; border:none; background-color:transparent">
                                    <span class="badge badge-danger">
                                        <i class="fas fa-plus"></i> Create Booking
                                    </span>
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (Slot::CountBookings($slot->id) > 0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered dataTable" id="dataTable" cellspacing="0"
                                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Email</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bookings as $booking)
                                                        <tr>
                                                            <td class="text-center">
                                                                <strong>
                                                                    {{ $loop->iteration }}
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($client = Client::Is($booking->user_id))
                                                                    <strong>
                                                                        {!! $client->name !!}
                                                                    </strong>
                                                                @else
                                                                    <strong>
                                                                        Not Found!
                                                                    </strong>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($client = Client::Is($booking->user_id))
                                                                    <strong>
                                                                        {!! $client->email !!}
                                                                    </strong>
                                                                @else
                                                                    <strong>
                                                                        Not Found!
                                                                    </strong>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>
                                                                    {{ date('d-M-Y', strtotime($booking->booked_at)) }}
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>
                                                                    @if (Slot::BookingStatusOfClient($slot->id,$booking->user_id) == 'BOOKED')
                                                                        <span class="badge badge-primary">
                                                                            Booked
                                                                        </span>
                                                                    @endif
                                                                    @if (Slot::BookingStatusOfClient($slot->id,$booking->user_id) == 'WAITING')
                                                                        <span class="badge badge-danger">
                                                                            {{ Slot::BookingStatusOfClient($slot->id,$booking->user_id) }}
                                                                        </span>
                                                                    @endif
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <button wire:click="CancelBooking({{ $booking->id }})"
                                                                    wire:loading.attr='disabled'
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-danger">
                                                                        <span wire:loading
                                                                            wire:target='CancelBooking({{ $booking->id }})'
                                                                            class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                        <i class="fas fa-times-circle"></i> Cancel
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
                                        <div class="col-sm-12 col-md-12 mt-2 mb-2 text-center">
                                            {{ $bookings->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="card-body">
                                <div class="text-center">
                                    <strong class="text-danger">
                                        No bookings found.
                                    </strong>
                                </div>
                            </div>
                    @endif
                </div>
            </div>
            <!--End::Slots-->
        </div>
</div>
@else
<div class="row justify-content-center align-align-items-center">
    <div class="col-xl-12">
        <div class="alert alert-danger  text-center" role="alert">
            <h4 class="alert-heading">
                <i class="fas fa-exclamation-triangle fa-5x"></i>
            </h4>
            <strong class="mt-2">
                You are not allowed to View Slots & Bookings.Please check your Abilities <a
                    href="{{ route('BusinessPermissions') }}">Here</a>
            </strong>
        </div>
    </div>
</div>
@endif
</div>
