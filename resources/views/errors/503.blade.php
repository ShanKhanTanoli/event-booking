@extends('layouts.dashboard')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper" style="height:100vh;">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <!--Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto">
                            503
                        </div>
                        <p class="lead text-gray-800 mb-5">
                            Service Unavailable
                        </p>
                        <p class="text-gray-500 mb-4">Server is temporarily unable to handle the request...</p>
                        <a href="{{ url('/') }}">← Back to Home</a>
                        @if (Auth::user())
                            <a href="{{ User::RedirectToDashboard() }}">←Go to Dashboard</a>
                        @endif
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
@endsection
