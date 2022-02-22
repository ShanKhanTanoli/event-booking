@extends('layouts.dashboard')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Begin::Sidebar-->
        @include('dashboard.admin.partials.sidebar')
        <!-- End::Sidebar-->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin::Topbar-->
                @include('dashboard.admin.partials.topbar')
                <!-- End::Topbar-->

                <!--Begin::Update Settings-->
                @livewire('dashboard.admin.settings.websitesettings')
                <!--Begin::Update Settings-->
            </div>
            <!-- End of Main Content -->

            <!-- Begin::Footer-->
            @include('dashboard.admin.partials.footer')
            <!-- End::Footer-->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#logo').click(function(){
                $('#logo').css('cursor', 'pointer');
                $('#uploadlogo').click();
            });
        });
    </script>
@endsection
