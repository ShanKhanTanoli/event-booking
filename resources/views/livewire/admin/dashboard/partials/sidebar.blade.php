<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 fixed-start bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('AdminDashboard', App::getLocale()) }}">
            <span class="ms-1 font-weight-bold text-white">
                {{ Setting::Logo() }}
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Dashboard/lang') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('AdminDashboard', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('lang.admindashboard') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('lang.adminbusiness') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Business') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('AdminBusiness') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-business-time"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('lang.adminbusiness') }}</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('lang.adminclients') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Clients') ? active bg-gradient-primary : '' @endif"
                    href="{{ route('AdminClients') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('lang.adminclients') }}</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('lang.adminevents') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Events') active bg-gradient-primary @else '' @endif"
                    href="{{ route('AdminEvents') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('lang.adminevents') }}</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('lang.adminpayments') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Payments') active bg-gradient-primary @else '' @endif"
                    href="{{ route('AdminPayments') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-money-bill"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('lang.adminpayments') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('lang.adminsettings') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Settings/General' or Request::path() == 'Admin/Settings/Profile' or Request::path() == 'Admin/Settings/Currency' or Request::path() == 'Admin/Settings/Language' or Request::path() == 'Admin/Settings/Stripe' or Request::path() == 'Admin/Settings/Password') active bg-gradient-primary @else '' @endif"
                    href="{{ route('AdminSettings') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('lang.adminsettings') }}</span>
                </a>
            </li>
            <hr>
            <!--Begin::Logout-->
            @livewire('auth.logout')
            <!--Begin::Logout-->
        </ul>
    </div>
</aside>