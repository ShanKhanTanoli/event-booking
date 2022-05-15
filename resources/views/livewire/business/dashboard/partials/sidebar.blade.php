<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 fixed-start bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('BusinessDashboard', App::getLocale()) }}">
            <span class="ms-1 font-weight-bold text-white">
                {{ Setting::Logo() }}
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Dashboard/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessDashboard', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('business.dashboard') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('business.platform-plans') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/PlatformPlans/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessPlatformPlans', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('business.platform-plans') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('business.clients') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Clients/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessClients', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('business.clients') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('business.events') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Events/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessEvents', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('business.events') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('business.business-details') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/BusinessDetails/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessDetails', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-business-time"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('business.business-details') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('business.plans') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Plans/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessPlans', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('business.plans') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('business.subscriptions') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Subscriptions/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessSubscriptions', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('business.subscriptions') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('business.stripe-connect') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/StripeConnect/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessStripeConnect', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fab fa-stripe"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('business.stripe-connect') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('business.settings') }}</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Business/Settings/Profile/' . App::getLocale() or Request::path() == 'Business/Settings/Password/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('BusinessEditProfile', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="nav-link-text ms-1">{{ trans('business.settings') }}</span>
                </a>
            </li>
            <hr>
            <!--Begin::Logout-->
            @livewire('auth.logout')
            <!--Begin::Logout-->
        </ul>
    </div>
</aside>
