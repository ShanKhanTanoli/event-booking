<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if (Business::CanUpdateReservation(Auth::user()->id))
        @if ($reservation->status == 'banned')
            <!--Begin::Alerts Notifications-->
            <div class="alert alert-solid alert-danger" role="alert">
                <strong>
                    This Reservation is banned.
                </strong>
            </div>
            <!--Begin::Alerts Notifications-->
        @endif
        <div class="row flex-lg-nowrap">
            <div class="col mb-3">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>
                            For Specific Days
                        </strong>
                    </div>
                    <div class="card-body">
                        <strong>
                            <p>
                                This is useful when you want to create Slots for Specific Days.
                            </p>
                        </strong>
                        <div class="text-center text-primary btn-sm mt-2">
                            <i class="fas fa-calendar-alt fa-3x"></i>
                        </div>
                        <div class="text-center mt-2">
                            <button wire:click="AddSpecificDays()" wire:loading.attr='disabled'
                                class="btn btn-primary btn-sm btn-block" type="button">
                                <span wire:loading wire:target='AddSpecificDays'
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Add Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>
                            Daily
                        </strong>
                    </div>
                    <div class="card-body">
                        <strong>
                            <p>
                                This is useful when you want to create Slots for Every Day.
                            </p>
                        </strong>
                        <div class="text-center text-primary btn-sm mt-2">
                            <i class="fas fa-calendar-alt fa-3x"></i>
                        </div>
                        <div class="text-center mt-2">
                            <button wire:click="AddDaily()" wire:loading.attr='disabled' class="btn btn-block btn-primary btn-sm"
                                type="button">
                                <span wire:loading wire:target='AddDaily'
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Add Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>
                            Weekly
                        </strong>
                    </div>
                    <div class="card-body">
                        <strong>
                            <p>
                                It will start from Monday to Friday.Saturady and Sunday will be off.
                            </p>
                        </strong>
                        <div class="text-center text-primary btn-sm mt-2">
                            <i class="fas fa-calendar-alt fa-3x"></i>
                        </div>
                        <div class="text-center mt-2">
                            <button wire:click="AddWeekly()" wire:loading.attr='disabled' class="btn btn-block btn-primary btn-sm"
                                type="button">
                                <span wire:loading wire:target='AddWeekly'
                                    class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Add Now
                            </button>
                        </div>
                    </div>
                </div>
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
                        You are not allowed to Edit/Update Reservations.Please check your Abilities <a
                            href="{{ route('BusinessPermissions') }}">Here</a>
                    </strong>
                </div>
            </div>
        </div>
    @endif
</div>
