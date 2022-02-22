<div class="col-12 col-lg-auto mb-3" style="width: 200px;">
    <div class="card p-3">
        <div class="e-navlist e-navlist--active-bg">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('AdminEditBusiness', $business->user_name) }}">
                        <i class="fas fa-user-cog mr-1"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('AdminEditBusinessDetails', $business->user_name) }}">
                        <i class="fas fa-business-time mr-1"></i>
                        <span>Business</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('AdminEditBusinessAbilities', $business->user_name) }}">
                        <i class="fas fa-user-shield mr-1"></i>
                        <span>Abilities</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="{{ route('AdminChangeBusinessPassword', $business->user_name) }}">
                        <i class="fas fa-shield-alt mr-1"></i>
                        <span>Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
