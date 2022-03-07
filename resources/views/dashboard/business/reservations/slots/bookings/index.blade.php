@extends('layouts.dashboard')

@section('styles')
    <!-- Custom styles for this page -->
    <link href="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin::Sidebar-->
        @include('dashboard.business.partials.sidebar')
        <!-- End::Sidebar-->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin::Topbar-->
                @include('dashboard.business.partials.topbar')
                <!-- End::Topbar-->

                <!--Begin::Slot Bookings-->
                @livewire('dashboard.business.reservations.slots.bookings.index',['slot' => $slot])
                <!--Begin::Slot Bookings-->
            </div>
            <!-- End of Main Content -->

            <!-- Begin::Footer-->
            @include('dashboard.business.partials.footer')
            <!-- End::Footer-->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            Livewire.on('RequestDelete', postId => {
                $('#DeleteModal').modal('show');
            });
            Livewire.on('DeleteSuccess', postId => {
                $('#DeleteModal').modal('hide');
            });
        });
    </script>
@endsection
