<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ User::RedirectToDashboard() }}">
        <div class="sidebar-brand-text mx-3">
            @if ($business = Business::Settings(Auth::user()->id))
                @if (!is_null($business->logo))
                    <img style="width:100px;" src="{{ asset('dashboard/images/business/logos/' . $business->logo) }}"
                        alt="Logo">
                @else
                    {{ $business->text_logo }}
                @endif
            @endif
        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if (Request::path() == 'Business/Dashboard') active @endif">
        <a class="nav-link" href="{{ User::RedirectToDashboard() }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Reservations
    </div>
    <!-- Nav Item - Reservations -->
    <li class="nav-item @if (Request::path() == 'Business/Reservations') active @endif">
        <a class="nav-link" href="{{ route('BusinessReservations') }}">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>My Reservations</span>
        </a>
    </li>
    @if (Business::CanCreateReservation(Auth::user()->id))
        <!-- Nav Item - Add Reservations -->
        <li class="nav-item @if (Request::path() == 'Business/AddReservations') active @endif">
            <a class="nav-link" href="{{ route('BusinessAddReservations') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Add Reservations</span>
            </a>
        </li>
    @endif
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Clients
    </div>
    @if (Business::CanViewClients(Auth::user()->id))
        <!-- Nav Item - Clients -->
        <li class="nav-item @if (Request::path() == 'Business/Clients') active @endif">
            <a class="nav-link" href="{{ route('BusinessClients') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>My Clients</span>
            </a>
        </li>
    @endif
    @if (Business::CanCreateClient(Auth::user()->id))
        <!-- Nav Item - Add Client -->
        <li class="nav-item @if (Request::path() == 'Business/AddClient') active @endif">
            <a class="nav-link" href="{{ route('BusinessAddClient') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Add Client</span>
            </a>
        </li>
    @endif
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Platform Pricing Plans
    </div>
    <!-- Nav Item - Plans -->
    <li class="nav-item @if (Request::path() == 'Business/SubscriptionsPlans') active @endif">
        <a class="nav-link" href="{{ route('PlatformSubscriptionsPlans') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Pay & Subscribe</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        My Pricing Plans
    </div>
    @if (Business::CanViewPricingPlans(Auth::user()->id))
        <!-- Nav Item - Plans -->
        <li class="nav-item @if (Request::path() == 'Business/PricingPlans') active @endif">
            <a class="nav-link" href="{{ route('BusinessPlans') }}">
                <i class="fas fa-fw fa-clipboard-list"></i>
                <span>My Plans</span>
            </a>
        </li>
    @endif
    @if (Business::CanCreatePricingPlans(Auth::user()->id))
        <!-- Nav Item - Add Plan -->
        <li class="nav-item @if (Request::path() == 'Business/PricingPlan') active @endif">
            <a class="nav-link" href="{{ route('BusinessAddPricingPlan') }}">
                <i class="fas fa-fw fa-plus"></i>
                <span>Add Plan</span>
            </a>
        </li>
    @endif
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Subscriptions
    </div>
    <!-- Nav Item - Profile -->
    <li class="nav-item @if (Request::path() == 'Business/MySubscriptions') active @endif">
        <a class="nav-link" href="{{ route('BusinessSubscriptions') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>My Subscriptions</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Personal Info
    </div>
    <!-- Nav Item - Profile -->
    <li class="nav-item @if (Request::path() == 'Business/Profile') active @endif">
        <a class="nav-link" href="{{ route('BusinessProfile') }}">
            <i class="fas fa-fw fa-user-cog"></i>
            <span>Profile</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Abilities
    </div>
    <!-- Nav Item - Profile -->
    <li class="nav-item @if (Request::path() == 'Business/Permissions') active @endif">
        <a class="nav-link" href="{{ route('BusinessPermissions') }}">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>Permissions</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Change Password
    </div>
    <!-- Nav Item - Security -->
    <li class="nav-item @if (Request::path() == 'Business/UpdatePassword') active @endif">
        <a class="nav-link" href="{{ route('BusinessUpdatePassword') }}">
            <i class="fas fa-fw fa-shield-alt"></i>
            <span>Security</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Get Paid
    </div>
     <!-- Nav Item - Get Paid -->
    <li class="nav-item @if (Request::path() == 'Business/ConnectAccount') active @endif">
        @if (Business::StripeConnectAccountID(Auth::user()->id))
        @if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
        
        <!--Begin::Complete Your Account-->
        @if (!$account->payouts_enabled)
        <a class="nav-link" href="{{ route('BusinessConnectAccount') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Complete Account</span>
        </a>
        @else
        <a class="nav-link" href="{{ route('BusinessConnectAccount') }}">
            <i class="fas fa-fw fa-money-check"></i>
            <span>Account Ready</span>
        </a>
        @endif
        <!--End::Complete Your Account-->

        @else
        <a class="nav-link" href="{{ route('BusinessConnectAccount') }}">
            <i class="fas fa-fw fa-university"></i>
            <span>Create Account</span>
        </a>
        @endif

        @else
        <a class="nav-link" href="{{ route('BusinessConnectAccount') }}">
            <i class="fas fa-fw fa-university"></i>
            <span>Create Account</span>
        </a>
        @endif
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Settings
    </div>
    <!-- Nav Item - Settings -->
    <li class="nav-item @if (Request::path() == 'Business/Settings') active @endif">
        <a class="nav-link" href="{{ route('BusinessSettings') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Settings</span>
        </a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
