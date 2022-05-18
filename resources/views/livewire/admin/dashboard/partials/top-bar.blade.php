<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="{{ route('AdminEditProfile', App::getLocale()) }}" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer" aria-hidden="true"></i>
                    </a>
                </li>

                @if (Currency::Count() > 0)
                    <!--Begin::Currency Switch-->
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-coins cursor-pointer" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            @foreach (Currency::all() as $currency)
                                <li class="mb-2">
                                    <button type="button"
                                        @if (Admin::Currency(Auth::user()->id) == $currency->name) style="color:#fff; background-image:linear-gradient(195deg, #42424a 0%, #191919 100%);" @endif
                                        wire:click="ChangeCurrency('{{ $currency->slug }}')"
                                        class="dropdown-item border-radius-md">
                                        <div class="d-flex py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6
                                                    class="text-sm font-weight-normal mb-1 @if (Admin::Currency(Auth::user()->id) == $currency->name) text-white @endif">
                                                    <span class="font-weight-bold">
                                                        {{ strtoupper($currency->name) }}
                                                    </span>
                                                    -
                                                    {{ $currency->description }}
                                                </h6>
                                            </div>
                                        </div>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <!--End::Currency Switch-->
                @endif

                @if (Language::Count() > 0)
                    <!--Begin::Language Switch-->
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-language cursor-pointer" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            @foreach (Language::all() as $language)
                                <li class="mb-2 active">
                                    <button
                                        @if (Admin::Language(Auth::user()->id) == $language->name) style="color:#fff; background-image:linear-gradient(195deg, #42424a 0%, #191919 100%);" @endif
                                        type="button" wire:click="ChangeLanguage('{{ $language->slug }}')"
                                        class="dropdown-item border-radius-md">
                                        <div class="d-flex py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6
                                                    class="text-sm font-weight-normal mb-1 @if (Admin::Language(Auth::user()->id) == $language->name) text-white @endif">
                                                    <span class="font-weight-bold">
                                                        {{ strtoupper($language->name) }}
                                                    </span>
                                                    -
                                                    {{ $language->description }}
                                                </h6>
                                            </div>
                                        </div>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <!--End::Language Switch-->
                @endif

                <!--Begin::Notifications-->
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer" aria-hidden="true"></i>
                        @if (Auth::user()->notifications()->unread()->count() > 0)
                            <sup>
                                <i style="font-size: 6px; color:#e91e63;" class="fas fa-circle"></i>
                            </sup>
                        @endif
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                        @forelse (Auth::user()->notifications()->take(3)->get() as $notifications)
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                @if (Str::length(trans($notifications->data['message']) > 15))
                                                    {!! Str::substr(trans($notifications->data['message']), 0, 15) !!}...
                                                @else
                                                    {!! trans($notifications->data['message']) !!}
                                                @endif
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1" aria-hidden="true"></i>
                                                {!! Helper::TimeAgo($notifications->created_at) !!}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                No notifications found
                                            </h6>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforelse
                        @if (Auth::user()->notifications()->count() > 3)
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md text-center text-dark"
                                    href="{{ route('AdminNotifications', App::getLocale()) }}">
                                    <strong>
                                        {{ trans('Admin.view-all') }}
                                    </strong>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <!--End::Notifications-->
            </ul>
        </div>
    </div>
</nav>
