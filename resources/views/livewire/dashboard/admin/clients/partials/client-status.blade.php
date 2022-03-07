<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            Unverified Clients
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountUnverifiedClients()) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
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
                            Verified Clients</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountVerifiedClients()) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-primary"></i>
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
                            Banned Clients
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountBannedClients()) }}
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
                            Active Clients</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountActiveClients()) }}
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
