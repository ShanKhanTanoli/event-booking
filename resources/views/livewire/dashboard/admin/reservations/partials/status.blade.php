<div class="row">
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            All
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-primary text-gray-800">
                            {{ number_format(Admin::CountAllReservations(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            Active
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-primary text-gray-800">
                            {{ number_format(Admin::CountActiveReservations(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            Archived
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-primary text-gray-800">
                            {{ number_format(Admin::CountArchivedReservations(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-archive fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            Banned
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-primary text-gray-800">
                            {{ number_format(Admin::CountBannedReservations(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-ban fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
