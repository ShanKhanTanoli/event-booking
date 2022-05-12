<div class="col-lg-2">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li class="nav-item @if (Request::path() == 'Admin/EditBusiness/' . $user->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/EditBusiness/' . $user->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminEditBusiness', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-user-edit me-2"></i>
                    <span class="text-sm">{{ trans('admin.business-profile') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Admin/BusinessClients/' . $user->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/BusinessClients/' . $user->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminBusinessClients', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-users me-2"></i>
                    <span class="text-sm">{{ trans('admin.business-clients') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Admin/SendMailToBusiness/' . $user->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/SendMailToBusiness/' . $user->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminSendBusinessMail', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-paper-plane me-2"></i>
                    <span class="text-sm">{{ trans('admin.business-send-mail') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Admin/BusinessMails/' . $user->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/BusinessMails/' . $user->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminBusinessMails', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-envelope me-2"></i>
                    <span class="text-sm">{{ trans('admin.business-mails') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Admin/UpdateBusiness/' . $user->slug . '/Password/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/UpdateBusiness/' . $user->slug . '/Password/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminUpdateBusinessPassword', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-lock me-2"></i>
                    <span class="text-sm">{{ trans('admin.business-password') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
