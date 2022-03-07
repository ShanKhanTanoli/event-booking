<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            Unverified Business
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountUnverifiedBusiness()) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-business-time fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-primary mb-1">
                            Verified Business</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountVerifiedBusiness()) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-business-time fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            Banned Business
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountBannedBusiness()) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-ban fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-primary mb-1">
                            Active Business</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountActiveBusiness()) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
