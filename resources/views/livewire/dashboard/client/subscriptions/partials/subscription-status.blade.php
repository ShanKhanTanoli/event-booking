<div class="row">
    <div class="col-xl-3 col-md-3 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-primary mb-1">
                            All Subscriptions
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Business::CountSubscriptions(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
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
                            Active Subscriptions
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Business::CountUnverifiedClients(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-start fa-2x text-gray-300"></i>
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
                        <div class="font-weight-bold text-primary mb-1">
                            Cancelled Subscriptions</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Business::CountVerifiedClients(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-stop-circle fa-2x text-gray-300"></i>
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
                        <div class="font-weight-bold text-primary mb-1">
                            Ended Subscriptions</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ number_format(Business::CountVerifiedClients(Auth::user()->id)) }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hourglass-end fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
