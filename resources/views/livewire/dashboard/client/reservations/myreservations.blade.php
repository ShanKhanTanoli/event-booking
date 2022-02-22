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
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th class="text-center">From Date</th>
                                                    <th class="text-center">To Date</th>
                                                    <th class="text-center">From Time</th>
                                                    <th class="text-center">To Time</th>
                                                    <th class="text-center">Capacity</th>
                                                    <th class="text-center">Booked</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">View</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (Client::CountBookings(Auth::user()->id) > 0)
                                                    @foreach ($slots as $slot)
                                                        <tr>
                                                            <td>
                                                                <strong>
                                                                    {{ $loop->iteration }}
                                                                </strong>
                                                            </td>
                                                            <td>
                                                                <strong>
                                                                    {!! substr($slot->name, 0, 12) !!}...
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>
                                                                    {{ date('d M y', strtotime($slot->start_date)) }}
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>
                                                                    {{ date('d M y', strtotime($slot->end_date)) }}
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>
                                                                    {{ date('h:i A', strtotime($slot->start_time)) }}
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <strong>
                                                                    {{ date('h:i A', strtotime($slot->end_time)) }}
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
                                                                    <span class="badge badge-danger">
                                                                        WAITING
                                                                    </span>
                                                                </strong>
                                                            </td>
                                                            <td class="text-center">
                                                                <button wire:click="View({{ $slot->id }})"
                                                                    wire:loading.attr='disabled'
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-primary">
                                                                        <span wire:loading
                                                                            wire:target='View({{ $slot->id }})'
                                                                            class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                        <i class="fas fa-eye"></i> View
                                                                    </span>
                                                                </button>
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($slot->status == 'active')
                                                                    @if (Client::ReservationIsActive(Auth::user()->id, $slot->id))
                                                                        <button
                                                                            wire:click="CancelNow({{ $slot->id }})"
                                                                            style="padding:0px; border:none; background-color:transparent">
                                                                            <span class="badge badge-danger">
                                                                                <i class="fas fa-mouse"></i> Cancel
                                                                            </span>
                                                                        </button>
                                                                    @else
                                                                        <button
                                                                            wire:click="BookNow({{ $slot->id }})"
                                                                            style="padding:0px; border:none; background-color:transparent">
                                                                            <span class="badge badge-primary">
                                                                                <i class="fas fa-mouse"></i> Book
                                                                            </span>
                                                                        </button>
                                                                    @endif
                                                                @else
                                                                    <button
                                                                        style="padding:0px; border:none; background-color:transparent"
                                                                        disabled>
                                                                        <span class="badge badge-danger">
                                                                            <i class="fas fa-mouse"></i> Book
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                        </tr>
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
