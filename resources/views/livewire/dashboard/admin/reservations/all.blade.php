<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->

    <!--Begin::Reservations Status-->
    @include('livewire.dashboard.admin.reservations.Reservationstatus')
    <!--Begin::Reservations Status-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-12 col-lg-12 d-flex">
                                    <div class="dataTables_length" id="dataTable_length">
                                        <label>Status &nbsp;
                                            <select wire:model="status" name="dataTable_length"
                                                aria-controls="dataTable"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="all">All</option>
                                                <option value="active">Active</option>
                                                <option value="archived">Archived</option>
                                                <option value="banned">Banned</option>
                                            </select>
                                        </label>
                                    </div>
                                    <div class="ml-4 dataTables_length" id="dataTable_length">
                                        <span wire:loading>Loading...</span>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                    </div>
                                </div>
                            </div>
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
                                                <th class="text-center">Cost</th>
                                                <th class="text-center">Status</th>
                                                <th colspan="4" class="text-center">Perform Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($reservations->count() > 0)
                                                @foreach ($reservations as $reservation)
                                                    <tr>
                                                        <td>
                                                            <strong>
                                                                {{ $loop->iteration }}
                                                            </strong>
                                                        </td>
                                                        <td>
                                                            <strong>
                                                                {!! substr($reservation->name, 0,8) !!}...
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            <strong>
                                                                {{ date('d M y', strtotime($reservation->start_date)) }}
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            <strong>
                                                                {{ date('d M y', strtotime($reservation->end_date)) }}
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            <strong>
                                                                {{ date('h:i A', strtotime($reservation->start_time)) }}
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            <strong>
                                                                {{ date('h:i A', strtotime($reservation->end_time)) }}
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            <strong>
                                                                0/{{ $reservation->capacity }}
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            <strong>
                                                                {{ number_format($reservation->token_cost) }}$
                                                            </strong>
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($reservation->status == 'active')
                                                                <span class="badge badge-primary">
                                                                    <i class="fas fa-check"></i> Active
                                                                </span>
                                                            @endif
                                                            @if ($reservation->status == 'archived')
                                                                <span class="badge badge-danger">
                                                                    <i class="fas fa-archive"></i>
                                                                    {{ ucfirst($reservation->status) }}
                                                                </span>
                                                            @endif
                                                            @if ($reservation->status == 'banned')
                                                                <span class="badge badge-danger">
                                                                    <i class="fas fa-ban"></i>
                                                                    {{ ucfirst($reservation->status) }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($reservation->status == 'active')
                                                                <button wire:click="Archive({{ $reservation->id }})"
                                                                    wire:loading.attr='disabled'
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-danger">
                                                                        <i class="fas fa-archive"></i> Archive
                                                                    </span>
                                                                </button>
                                                            @else
                                                                <button wire:click="Activate({{ $reservation->id }})"
                                                                    wire:loading.attr='disabled'
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-primary">
                                                                        <i class="fas fa-check"></i> Activate
                                                                    </span>
                                                                </button>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($reservation->status == 'banned')
                                                                <button wire:click="UnBan({{ $reservation->id }})"
                                                                    wire:loading.attr='disabled'
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-dark">
                                                                        <i class="fas fa-check-double"></i> Unban
                                                                    </span>
                                                                </button>
                                                            @else
                                                                <button wire:click="BanNow({{ $reservation->id }})"
                                                                    wire:loading.attr='disabled'
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-danger">
                                                                        <i class="fas fa-ban"></i> Ban Now
                                                                    </span>
                                                                </button>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <button wire:click="Edit({{ $reservation->id }})"
                                                                wire:loading.attr='disabled'
                                                                style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-primary">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </span>
                                                            </button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button
                                                                wire:click="RequestDelete({{ $reservation->id }})"
                                                                wire:loading.attr='disabled'
                                                                style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-danger">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </span>
                                                            </button>
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
                            {{ $reservations->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Begin::Delete Modal-->
    @include('dashboard.admin.reservations.DeleteModal')
    <!-- End::Delete Modal-->
</div>
