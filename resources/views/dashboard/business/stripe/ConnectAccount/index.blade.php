@extends('layouts.dashboard')

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

                <!--Begin::Stripe Connect Account-->
                @livewire('dashboard.business.stripe.connect-account')
                <!--Begin::Stripe Connect Account-->
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
