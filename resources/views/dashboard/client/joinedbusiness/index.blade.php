@extends('layouts.dashboard')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Begin::Sidebar-->
        @include('dashboard.client.partials.sidebar')
        <!-- End::Sidebar-->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin::Topbar-->
                @include('dashboard.client.partials.topbar')
                <!-- End::Topbar-->

                <!--Begin::Business Details-->
                @livewire('dashboard.client.details.businessdetails')
                <!--Begin::Business Details-->
            </div>
            <!-- End of Main Content -->

            <!-- Begin::Footer-->
            @include('dashboard.client.partials.footer')
            <!-- End::Footer-->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
@endsection
