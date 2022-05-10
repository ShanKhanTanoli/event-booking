<div class="row">
    <div class="col-12">
        <!--Begin::Tab Menu-->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a wire:ignore.self class="nav-link @if (Request::path() == 'Admin/EditBusiness/' . $user->slug . '/' . App::getLocale()) active @endif" aria-current="page"
                    href="{{ route('AdminEditBusiness', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}">
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a wire:ignore.self class="nav-link @if (Request::path() == 'Admin/SendMail/' . $user->slug . '/' . App::getLocale()) active @endif" aria-current="page"
                    href="{{ route('AdminSendBusinessMail', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}">
                    Send Mail
                </a>
            </li>
            <li class="nav-item">
                <a wire:ignore.self class="nav-link @if (Request::path() == 'Admin/BusinessMails/' . $user->slug . '/' . App::getLocale()) active @endif" aria-current="page"
                    href="{{ route('AdminBusinessMails', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}">
                    Mails
                </a>
            </li>
            <li class="nav-item">
                <a wire:ignore.self class="nav-link @if (Request::path() == 'Admin/UpdateBusiness/' . $user->slug . '/Password/' . App::getLocale()) active @endif"
                    href="{{ route('AdminUpdateBusinessPassword', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}">
                    Password
                </a>
            </li>
        </ul>
        <!--End::Tab Menu-->
    </div>
</div>
