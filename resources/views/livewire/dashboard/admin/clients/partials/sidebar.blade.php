<div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
        <div class="e-navlist e-navlist--active-bg">
            <ul class="nav">
                <li class="nav-item business_side_menu @if (Request::path() == 'Admin/Client/'.$client->reg_no.'/Edit') active_class @endif">
                    <a class="nav-link px-2 business_side_a" href="{{ route('AdminEditClient', $client->reg_no) }}">
                        <i class="fas fa-user-cog mr-1"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item business_side_menu @if (Request::path() == 'Admin/Client/'.$client->reg_no.'/Subscriptions') active_class @endif">
                    <a class="nav-link px-2 business_side_a" href="{{ route('AdminViewClientSubscriptions', $client->reg_no) }}">
                        <i class="fas fa-money-bill mr-1"></i>
                        <span>Subscriptions</span>
                    </a>
                </li>
                <li class="nav-item business_side_menu @if (Request::path() == 'Admin/Client/'.$client->reg_no.'/ChangePassword') active_class @endif">
                    <a class="nav-link px-2 business_side_a" href="{{ route('AdminChangeClientPassword', $client->reg_no) }}">
                        <i class="fas fa-shield-alt mr-1"></i>
                        <span>Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
