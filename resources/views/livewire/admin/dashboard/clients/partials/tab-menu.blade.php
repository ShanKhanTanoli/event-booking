<div class="col-lg-2">
    <div class="card position-sticky">
        <ul class="nav flex-column bg-white border-radius-lg p-3">
            <li class="nav-item @if (Request::path() == 'Admin/EditClient/' . $user->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/EditClient/' . $user->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminEditClient', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-user-edit me-2"></i>
                    <span class="text-sm">{{ trans('admin.client-profile') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Admin/SendMailToClient/' . $user->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/SendMailToClient/' . $user->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminSendClientMail', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-paper-plane me-2"></i>
                    <span class="text-sm">{{ trans('admin.client-send-mail') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Admin/ClientMails/' . $user->slug . '/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/ClientMails/' . $user->slug . '/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminClientMails', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-envelope me-2"></i>
                    <span class="text-sm">{{ trans('admin.client-mails') }}</span>
                </a>
            </li>
            <li class="nav-item @if (Request::path() == 'Admin/UpdateClient/' . $user->slug . '/Password/' . App::getLocale()) active bg-gradient-primary @endif" wire:ignore.self>
                <a class="nav-link text-dark d-flex @if (Request::path() == 'Admin/UpdateClient/' . $user->slug . '/Password/' . App::getLocale()) active text-white @endif"
                    href="{{ route('AdminUpdateClientPassword', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}"
                    wire:ignore.self>
                    <i class="fas fa-lock me-2"></i>
                    <span class="text-sm">{{ trans('admin.client-password') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
