<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 fixed-start  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('ClientDashboard', App::getLocale()) }}">
            <span class="ms-1 font-weight-bold text-white">
                {{ Setting::Logo() }}
            </span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto h-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Dashboard/' . App::getLocale()) ? active bg-gradient-primary : '' @endif"
                    href="{{ route('ClientDashboard', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('client.dashboard') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('client.business-plans') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'ClientBusinessPlans/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientBusinessPlans', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('client.business-plans') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('client.events') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Events/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientEvents', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('client.events') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('client.subscriptions') }}
                </h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Subscriptions/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientSubscriptions', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('client.subscriptions') }}
                    </span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                    {{ trans('client.settings') }}</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white @if (Request::path() == 'Client/Settings/Profile/' . App::getLocale() or Request::path() == 'Client/Settings/Password/' . App::getLocale()) active bg-gradient-primary @else '' @endif"
                    href="{{ route('ClientEditProfile', App::getLocale()) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-cog"></i>
                    </div>
                    <span class="nav-link-text ms-1">
                        {{ trans('client.settings') }}
                    </span>
                </a>
            </li>
            <hr>
            <!--Begin::Logout-->
            @livewire('auth.logout')
            <!--Begin::Logout-->
        </ul>
    </div>
</aside>
