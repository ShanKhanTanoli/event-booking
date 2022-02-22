<div>
    @if ($business = Client::JoinedBusiness(Auth::user()->id))
        <div class="container-fluid">
            <div class="row flex-lg-nowrap">
                <div class="col">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="e-profile">
                                        <div class="row">
                                            <div class="col-12 col-sm-auto mb-3">
                                                <div class="mx-auto" style="width: 140px;">
                                                    <div class="d-flex justify-content-center align-items-center rounded"
                                                        style="height: 140px; background-color: rgb(233, 236, 239);">
                                                        @if (!is_null($business->business_avatar))
                                                            <img style="width:100%;"
                                                                src="{{ asset('dashboard/images/business/businesslogos/' . $business->business_avatar) }}"
                                                                alt="Logo">
                                                        @else
                                                            <span
                                                                style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! $business->business_name !!}
                                                    </h4>
                                                    <p class="mb-0">
                                                        <span class="text-muted">
                                                            {{ __('@' . $business->business_user_name) }}
                                                        </span>
                                                    </p>
                                                    <div class="mt-3">
                                                        <a href="{{ route('Reservations') }}"
                                                            style="border:none; padding:0px; background-color:transparent;"
                                                            type="button">
                                                            <span class="badge badge-primary">
                                                                <i class="fa fa-fw fa-chalkboard-teacher"></i>
                                                                Reservations
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="text-center text-sm-right">
                                                    <span class="badge badge-primary">{{ ucfirst($business->role) }}
                                                        Account</span>
                                                    <div class="text-muted"><small>Joined
                                                            {{ date('d M Y', strtotime($business->created_at)) }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row flex-lg-nowrap">
                <div class="col">
                    <div class="row">
                        <div class="col mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="mt-4 mb-3">Business Details</h6>
                                    <table class="table user-view-table m-0">
                                        <tbody>
                                            <tr>
                                                <td>Name:</td>
                                                <td>{{ $business->business_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Username:</td>
                                                <td>{{ $business->business_user_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td>{{ $business->business_email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td>
                                                <td>{!! $business->business_phone !!}</td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td>
                                                    {{ $business->business_address }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Description:</td>
                                                <td>
                                                    {{ $business->business_bio }}
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row justify-content-center align-align-items-center">
                <div class="col-xl-12">
                    <div class="alert alert-danger  text-center" role="alert">
                        <h4 class="alert-heading mb-5">
                            <i class="fas fa-exclamation-triangle fa-5x"></i>
                        </h4>
                        <strong class="mt-5">
                            You did not Join any Business Or Business Owner removed you from his/her Business.
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
