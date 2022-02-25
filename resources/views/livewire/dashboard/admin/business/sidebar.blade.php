<div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
        <div class="e-navlist e-navlist--active-bg">
            <ul class="nav">
                <li class="nav-item business_side_menu @if (Request::path() == 'Admin/'.$business->reg_no.'/Edit') active_class @endif">
                    <a class="nav-link px-2 business_side_a" href="{{ route('AdminEditBusiness', $business->reg_no) }}">
                        <i class="fas fa-user-cog mr-1"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item business_side_menu @if (Request::path() == 'Admin/'.$business->reg_no.'/BusinessDetails') active_class @endif">
                    <a class="nav-link px-2 business_side_a" href="{{ route('AdminEditBusinessDetails', $business->reg_no) }}">
                        <i class="fas fa-business-time mr-1"></i>
                        <span>Business</span>
                    </a>
                </li>
                <li class="nav-item business_side_menu @if (Request::path() == 'Admin/'.$business->reg_no.'/Abilities') active_class @endif">
                    <a class="nav-link px-2 business_side_a" href="{{ route('AdminEditBusinessAbilities', $business->reg_no) }}">
                        <i class="fas fa-user-shield mr-1"></i>
                        <span>Abilities</span>
                    </a>
                </li>
                <li class="nav-item business_side_menu @if (Request::path() == 'Admin/'.$business->reg_no.'/ChangePassword') active_class @endif">
                    <a class="nav-link px-2 business_side_a" href="{{ route('AdminChangeBusinessPassword', $business->reg_no) }}">
                        <i class="fas fa-shield-alt mr-1"></i>
                        <span>Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
