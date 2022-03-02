<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold text-primary mb-1">
                            Active Plans</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountActivePlans(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            Archived Plans
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Admin::CountArchivedPlans(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-archive fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
