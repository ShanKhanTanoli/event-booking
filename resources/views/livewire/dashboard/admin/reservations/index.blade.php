<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <!--Begin::Reservations Status-->
    @include('livewire.dashboard.admin.reservations.partials.status')
    <!--Begin::Reservations Status-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!--Begin::Reservations-->
            @include('livewire.dashboard.admin.reservations.partials.table')
            <!--End::Reservations-->
        </div>
    </div>
    <!-- Begin::Delete Modal-->
    @include('dashboard.admin.reservations.DeleteModal')
    <!-- End::Delete Modal-->
</div>
