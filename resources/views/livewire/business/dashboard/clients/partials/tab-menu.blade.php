<div class="row">
    <div class="col-12">
        <!--Begin::Tab Menu-->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a wire:ignore.self class="nav-link @if (Request::path() == 'Business/EditClient/' . $user->slug . '/' . App::getLocale()) active @endif" aria-current="page"
                    href="{{ route('BusinessEditClient', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}">
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a wire:ignore.self class="nav-link @if (Request::path() == 'Business/UpdateClient/' . $user->slug . '/Password/' . App::getLocale()) active @endif"
                    href="{{ route('BusinessUpdateClientPassword', ['slug' => $user->slug, 'lang' => App::getLocale()]) }}">
                    Password
                </a>
            </li>
        </ul>
        <!--End::Tab Menu-->
    </div>
</div>
