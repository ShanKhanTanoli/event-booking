@extends('layouts.dashboard')

@section('styles')
    <style>
        .ui-w-100 {
            width: 100px !important;
            height: auto;
        }

        .card {
            background-clip: padding-box;
            box-shadow: 0 1px 4px rgba(24, 28, 33, 0.012);
        }

        .user-view-table td:first-child {
            width: 9rem;
        }

        .user-view-table td {
            padding-right: 0;
            padding-left: 0;
            border: 0;
        }

        .text-light {
            color: #babbbc !important;
        }

        .card .row-bordered>[class*=" col-"]::after {
            border-color: rgba(24, 28, 33, 0.075);
        }

        .text-xlarge {
            font-size: 170% !important;
        }

    </style>
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

                <!--Begin::View Permissions-->
                @livewire('dashboard.business.permissions.viewpermissions')
                <!--Begin::View Permissions-->

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
