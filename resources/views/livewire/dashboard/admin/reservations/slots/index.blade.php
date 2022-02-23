<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <!--Begin::Reservations Info-->
    @include('livewire.dashboard.business.reservations.partials.info')
    <!--Begin::Reservations Info-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!--Begin::Slots-->
            <div class="card shadow mb-4">
                @if (Business::CountSlots($reservation->id) > 0)
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" cellspacing="0"
                                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th>Name</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Time</th>
                                                    <th class="text-center">Capacity</th>
                                                    <th class="text-center">Booked</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($slots as $slot)
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
                                                                {{ number_format($slot->capacity) }}
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            <strong>
                                                                {{ number_format(Slot::CountBookings($slot->id)) }}
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            <button wire:click="DeleteSlot({{ $slot->id }})"
                                                                wire:loading.attr='disabled'
                                                                style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-danger">
                                                                    <span wire:loading
                                                                        wire:target='DeleteSlot({{ $slot->id }})'
                                                                        class="spinner-border spinner-border-sm"
                                                                        role="status" aria-hidden="true"></span>
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
                                    <div class="col-sm-12 col-md-12 mt-2 mb-2 text-center">
                                        @if ($slots->count() != Business::CountSlots($reservation->id))
                                            <button wire:click='LoadMore' wire:loading.attr='disabled'
                                                class="btn btn-sm btn-primary">
                                                <span wire:loading wire:target='LoadMore'
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Load More
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        <div class="text-center">
                            <strong class="text-danger">
                                No slots found.Add some slots.
                            </strong>
                        </div>
                    </div>
                @endif
            </div>
            <!--End::Slots-->
        </div>
    </div>
    <!-- Begin::Delete Modal-->
    @include('dashboard.business.reservations.DeleteModal')
    <!-- End::Delete Modal-->
</div>
