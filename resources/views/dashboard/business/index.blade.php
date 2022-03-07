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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessReservations') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    My Reservations</div>
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    {{ number_format(Business::CountReservations(Auth::user()->id)) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-chalkboard-teacher fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessClients') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    My Clients</div>
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    {{ number_format(Business::CountClients(Auth::user()->id)) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-users fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('PlatformSubscriptionsPlans') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    Platform Pricing Plans
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessPlans') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    My Plans</div>
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    {{ number_format(Business::CountPlans(Auth::user()->id)) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessSubscriptions') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    My Subscriptions</div>
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    {{ number_format(Business::CountSubscriptions(Auth::user()->id)) }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar-alt fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessProfile') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    Profile
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-cog fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessPermissions') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    Permissions
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user-shield fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessUpdatePassword') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class=" mb-0 font-weight-bold text-gray-800">
                                                    Password
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-shield-alt fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessConnectAccount') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    Get Paid
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-university fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-md-6 mb-4">
                            <a href="{{ route('BusinessSettings') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class=" mb-0 font-weight-bold text-gray-800">
                                                    Settings
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-cogs fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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
