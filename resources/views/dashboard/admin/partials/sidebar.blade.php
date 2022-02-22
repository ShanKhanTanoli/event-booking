<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ User::RedirectToDashboard() }}">
        <div style="width:100px;" class="sidebar-brand-text mx-3">
            @if ($settings = Admin::Settings())
                @if (!is_null($settings->logo))
                    <img style="width:100%;" src="{{ asset('dashboard/images/admin/logos/'.$settings->logo) }}" alt="Logo">
                @else
                    {{ $settings->text_logo }}
                @endif
            @endif
        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (Request::path() == 'Admin/Dashboard') active @endif">
        <a class="nav-link" href="{{ User::RedirectToDashboard() }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Business
    </div>
    <!-- Nav Item - Business -->
    <li class="nav-item @if (Request::path() == 'Admin/Business') active @endif">
        <a class="nav-link" href="{{ route('AdminBusiness') }}">
            <i class="fas fa-fw fa-business-time"></i>
            <span>Business</span>
        </a>
    </li>
        <!-- Nav Item - Add Business -->
        <li class="nav-item @if (Request::path() == 'Admin/AddBusiness') active @endif">
            <a class="nav-link" href="{{ route('AdminAddBusiness') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Add Business</span>
            </a>
        </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Clients
    </div>
    <!-- Nav Item - Clients -->
    <li class="nav-item @if (Request::path() == 'Admin/Clients') active @endif">
        <a class="nav-link" href="{{ route('AdminClients') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Clients</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pricing & Plans
    </div>
        <!-- Nav Item - PricingPlans -->
        <li class="nav-item @if (Request::path() == 'Admin/PricingPlans') active @endif">
            <a class="nav-link" href="{{ route('AdminPricingPlans') }}">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>Pricing</span>
            </a>
        </li>
           <!-- Nav Item - Add Plans -->
           <li class="nav-item @if (Request::path() == 'Admin/AddPricingPlans') active @endif">
            <a class="nav-link" href="{{ route('AdminAddPricingPlans') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Add Plans</span>
            </a>
        </li>
        <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Reservations
    </div>
    <!-- Nav Item - Reservations -->
    <li class="nav-item @if (Request::path() == 'Admin/Reservations') active @endif">
        <a class="nav-link" href="{{ route('AdminReservations') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Reservations</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Profile
    </div>
    <!-- Nav Item - Profile -->
    <li class="nav-item @if (Request::path() == 'Admin/Profile') active @endif">
        <a class="nav-link" href="{{ route('AdminProfile') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Profile</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Change Password
    </div>
    <!-- Nav Item - Security -->
    <li class="nav-item @if (Request::path() == 'Admin/Security') active @endif">
        <a class="nav-link" href="{{ route('AdminSecurity') }}">
            <i class="fas fa-fw fa-shield-alt"></i>
            <span>Security</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Stripe Keys
    </div>
    <!-- Nav Item - Stripe -->
    <li class="nav-item @if (Request::path() == 'Admin/Stripe') active @endif">
        <a class="nav-link" href="{{ route('AdminStripe') }}">
            <i class="fab fa-fw fa-stripe-s"></i>
            <span>Stripe</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Settings
    </div>
    <!-- Nav Item - Settings -->
    <li class="nav-item @if (Request::path() == 'Admin/Settings') active @endif">
        <a class="nav-link" href="{{ route('AdminSettings') }}">
            <i class="fas fa-fw fa-tools"></i>
            <span>Settings</span>
        </a>
    </li>
    <!-- Nav Item - Home -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
