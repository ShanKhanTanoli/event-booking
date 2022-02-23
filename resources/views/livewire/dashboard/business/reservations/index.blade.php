<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if (Business::CanViewReservations(Auth::user()->id))
    <!--Begin::Reservations Status-->
    @include('livewire.dashboard.business.reservations.partials.status')
    <!--Begin::Reservations Status-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!--Begin::Reservations-->
            @include('livewire.dashboard.business.reservations.partials.table')
            <!--End::Reservations-->
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
                    You are not allowed to View Reservations.Please check your Abilities <a href="{{ route('BusinessPermissions') }}">Here</a>
                </strong>
            </div>
        </div>
    </div>
    @endif
    <!-- Begin::Delete Modal-->
    @include('dashboard.business.reservations.DeleteModal')
    <!-- End::Delete Modal-->
</div>