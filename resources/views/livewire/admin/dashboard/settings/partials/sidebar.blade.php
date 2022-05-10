<div class="col-lg-3">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Admin/Settings/General/' . App::getLocale()) active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/General/' . App::getLocale()) active text-white @else @endif"
                    href="{{ route('AdminSettings', App::getLocale()) }}">
                    <i class="fas fa-cog me-2"></i>
                    <span class="text-sm">{{ trans('admin.general') }}</</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Admin/Settings/Profile/' . App::getLocale()) active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/Profile/' . App::getLocale()) active text-white @else @endif"
                    href="{{ route('AdminEditProfile', App::getLocale()) }}">
                    <i class="fas fa-user-edit me-2"></i>
                    <span class="text-sm">{{ trans('admin.profile') }}</</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Admin/Settings/Stripe/' . App::getLocale()) active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/Stripe/' . App::getLocale()) active text-white @else @endif"
                    href="{{ route('AdminStripe', App::getLocale()) }}">
                    <i class="fab fa-cc-stripe me-2"></i>
                    <span class="text-sm">{{ trans('admin.stripe') }}</</span>
                </a>
            </li>
            <li wire:ignore.self
                class="nav-item @if (Request::path() == 'Admin/Settings/Password/' . App::getLocale()) active bg-gradient-primary @else @endif">
                <a wire:ignore.self
                    class="nav-link text-dark d-flex @if (Request::path() == 'Admin/Settings/Password/' . App::getLocale()) active text-white @else @endif"
                    href="{{ route('AdminEditPassword', App::getLocale()) }}">
                    <i class="fas fa-lock me-2"></i>
                    <span class="text-sm">{{ trans('admin.password') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
