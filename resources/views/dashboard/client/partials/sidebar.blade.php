<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ User::RedirectToDashboard() }}">
        <div class="sidebar-brand-text mx-3">
            @if ($business = Client::JoinedBusiness(Auth::user()->id))
                @if ($business = Business::Settings($business->id))
                    @if (!is_null($business->logo))
                        <img style="width:100px;"
                            src="{{ asset('dashboard/images/business/logos/' . $business->logo) }}" alt="Logo">
                    @else
                        {{ $business->text_logo }}
                    @endif
                @endif
            @else
                Logo
            @endif
        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (Request::path() == 'Client/Dashboard') active @endif">
        <a class="nav-link" href="{{ User::RedirectToDashboard() }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pricing
    </div>
    <!-- Nav Item - PricingPlans -->
    <li class="nav-item @if (Request::path() == 'Client/PricingPlans') active @endif">
        <a class="nav-link" href="{{ route('ClientPricingPlans') }}">
            <i class="fas fa-fw fa-clipboard"></i>
            <span>Pricing Plans</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Subscriptions
    </div>
    <!-- Nav Item - Subscriptions -->
    <li class="nav-item @if (Request::path() == 'Client/Subscriptions') active @endif">
        <a class="nav-link" href="{{ route('ClientSubscriptions') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Subscriptions</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Reservations
    </div>
    <!-- Nav Item - Reservations -->
    <li class="nav-item @if (Request::path() == 'Client/Reservations') active @endif">
        <a class="nav-link" href="{{ route('Reservations') }}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Reservations</span>
        </a>
    </li>
    <!-- Nav Item - My Reservations -->
    <li class="nav-item @if (Request::path() == 'Client/MyReservations') active @endif">
        <a class="nav-link" href="{{ route('ClientReservations') }}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>My Reservations</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Personal Info
    </div>
    <!-- Nav Item - Profile -->
    <li class="nav-item @if (Request::path() == 'Client/Profile')  active @endif">
        <a class="nav-link" href="{{ route('ClientProfile') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Profile</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Business Info
    </div>
    <!-- Nav Item - Business/Details -->
    <li class="nav-item @if (Request::path() == 'Client/JoinedBusiness')  active @endif">
        <a class="nav-link" href="{{ route('ClientJoinedBusiness') }}">
            <i class="fas fa-fw fa-business-time"></i>
            <span>Joined Business</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Change Password
    </div>
    <!-- Nav Item - Security -->
    <li class="nav-item @if (Request::path() == 'Client/UpdatePassword') active @endif">
        <a class="nav-link" href="{{ route('ClientUpdatePassword') }}">
            <i class="fas fa-fw fa-shield-alt"></i>
            <span>Security</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
