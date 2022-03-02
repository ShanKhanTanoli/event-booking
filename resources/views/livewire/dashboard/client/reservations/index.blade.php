<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if ($business = Client::JoinedBusiness(Auth::user()->id))
        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                @if (count($reservations) > 0)
                    @foreach ($reservations as $reservation)
                        @if (Slot::ReservationIsActive($reservation->id))
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex">
                                    <div class="col p-0">
                                        <strong>
                                            {!! substr($reservation->name, 0, 30) !!}
                                        </strong>
                                    </div>
                                </div>
                                @if (Business::Slots($reservation->id)->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <!--Begin::Slots-->
                                                        @include('livewire.dashboard.client.reservations.partials.slots')
                                                        <!--End::Slots-->
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-sm-12 text-center">
                                                        <a href="{{ route('ClientViewReservationSlots', $reservation->slug) }}"
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
                                                Slots will be available soon.
                                            </strong>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                    <div class="row">
                        <div class="col-sm-12 col-md-12 mt-2 mb-2 text-center">
                            <button wire:click='LoadMore' wire:loading.attr='disabled' class="btn btn-sm btn-primary">
                                <span wire:loading wire:target='LoadMore' class="spinner-border spinner-border-sm"
                                    role="status" aria-hidden="true"></span>
                                Load More
                            </button>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger  text-center" role="alert">
                        <h4 class="alert-heading">
                            <i class="fas fa-exclamation-triangle fa-5x"></i>
                        </h4>
                        <strong class="mt-2">
                            Reservations will be available soon.
                        </strong>
                    </div>
                @endif
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
