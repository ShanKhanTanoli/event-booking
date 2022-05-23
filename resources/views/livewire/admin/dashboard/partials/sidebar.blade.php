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
                <a class="nav-link text-white @if (Request::path() == 'Admin/Dashboard/' . App::getLocale()) ? active bg-gradient-primary : '' @endif"
                    href="{{ route('AdminDashboard', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('admin.dashboard') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('admin.business') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Business/' . App::getLocale()) ? active bg-gradient-primary : '' @endif"
                    href="{{ route('AdminBusiness', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-business-time"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('admin.business') }}</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('admin.clients') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Clients/' . App::getLocale()) ? active bg-gradient-primary : '' @endif"
                    href="{{ route('AdminClients', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('admin.clients') }}</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('admin.events') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Events/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('AdminEvents', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('admin.events') }}</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('admin.plans') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Plans/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('AdminPlans', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('admin.plans') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('admin.subscriptions') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Subscriptions/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('AdminSubscriptions', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('admin.subscriptions') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('admin.payments') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Payments/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('AdminPayments', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-money-bill"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('admin.payments') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('admin.settings') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Admin/Settings/General/' . App::getLocale() or Request::path() == 'Admin/Settings/Profile/' . App::getLocale() or Request::path() == 'Admin/Settings/Currency/' . App::getLocale() or Request::path() == 'Admin/Settings/Language/' . App::getLocale() or Request::path() == 'Admin/Settings/Stripe/' . App::getLocale() or Request::path() == 'Admin/Settings/Password/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('AdminSettings', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('admin.settings') }}</span>
                </a>
            </li>
            <hr>
            <!--Begin::Logout-->
            @livewire('auth.logout')
            <!--Begin::Logout-->
        </ul>
    </div>
</aside>
