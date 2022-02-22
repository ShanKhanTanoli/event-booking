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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0">Dashboard</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="{{ route('ClientPricingPlans') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pricing Plans</div>
                                                <div class="mb-0 font-weight-bold text-primary">
                                                    View,Subscribe
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="{{ route('ClientSubscriptions') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Subscriptions</div>
                                                <div class="mb-0 font-weight-bold text-primary">
                                                    View Subscriptions
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
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="{{ route('Reservations') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Reservations</div>
                                                <div class="mb-0 font-weight-bold text-primary">
                                                    View,Book,Cancel
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
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="{{ route('ClientReservations') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    My Reservations</div>
                                                <div class="mb-0 font-weight-bold text-primary">
                                                    Booked Reservations
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
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="{{ route('ClientProfile') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Profile</div>
                                                <div class="mb-0 font-weight-bold text-primary">
                                                    View,Update
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
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="{{ route('ClientJoinedBusiness') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Joined Business</div>
                                                <div class="mb-0 font-weight-bold text-primary">
                                                    View
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-business-time fa-3x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <a href="{{ route('ClientUpdatePassword') }}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Security</div>
                                                <div class="mb-0 font-weight-bold text-primary">
                                                    Update Password
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
                    </div>
                </div>
                <!-- /.container-fluid -->
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
