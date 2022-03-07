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

                <!--Begin::Update Business-->
                @livewire('dashboard.admin.business.update',['business' => $business])
                <!--Begin::Update Business-->
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
            $('#avatar').click(function(){
                $('#avatar').css('cursor', 'pointer');
                $('#uploadavatar').click();
            });
        });
    </script>
@endsection
