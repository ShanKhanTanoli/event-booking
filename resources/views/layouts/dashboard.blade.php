<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--====== CSRF Token ======-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--====== Title ======-->
    <title>{{ ucfirst(Request::path()) }}</title>
    @yield('stripe')
    @if (Auth::user())
        <!-- Favicon -->
        @if ($business = Client::JoinedBusiness(Auth::user()->id))
            @if ($business = Business::Settings($business->id))
                @if (!is_null($business->logo))
                    <link rel="icon" href="{{ asset('dashboard/images/business/logos/' . $business->logo) }}" />
                @else
                    {{ $business->text_logo }}
                @endif
            @endif
        @endif
    @endif
    <!-- Custom fonts for this template-->
    <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <!-- Custom styles for this template-->
    <link href="{{ asset('dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles -->
    @yield('styles')
    <!-- Livewire styles -->
    @livewireStyles
</head>

<body id="page-top">
    <!-- Begin::Content-->
    @yield('content')
    <!-- End::Content-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded bg-secondary" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!--Begin::Logout Modal-->
    @livewire('dashboard.auth.logout')
    <!--End::Logout Modal-->
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>
    @yield('scripts')
    <!-- Livewire scripts -->
    @livewireScripts
</body>

</html>
