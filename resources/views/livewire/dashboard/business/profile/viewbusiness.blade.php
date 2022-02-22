<div>
    <div class="container-fluid">
        <!--Begin::Alerts Notifications-->
        @include('errors.messages')
        <!--End::Alerts Notifications-->
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
                                                    @if(!is_null($business_avatar = Business::Is(Auth::user()->id)->business_avatar))
                                                    <img style="width:100%;" src="{{ asset('dashboard/images/business/businesslogos/'.$business_avatar)}}" alt="Logo">
                                                    @else
                                                    <span style="color: rgb(166, 168, 170); font: bold 8pt Arial; text-align:center;">
                                                        140x140
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! Auth::user()->business_name !!}</h4>
                                                <p class="mb-0">
                                                    <a class="text-muted"
                                                        href=" {{ route('ViewBusiness', Auth::user()->business_user_name) }}">
                                                        {{ __('@' . Auth::user()->business_user_name) }}
                                                        <button class="ml-2"
                                                            style="border:none; padding:0px; background-color:transparent;"
                                                            type="button">
                                                            <span class="badge badge-primary">
                                                                <i class="fa fa-fw fa-eye"></i>
                                                                View as Public
                                                            </span>
                                                        </button>
                                                    </a>
                                                </p>
                                                <div class="mt-2">
                                                    <span class="text-muted">
                                                        Your Clients can use this Link
                                                        <strong class="text-primary"
                                                            style="text-decoration: underline;">
                                                            {{ route('RegisterAsClient', Auth::user()->business_user_name) }}
                                                        </strong>
                                                        to register.
                                                    </span>
                                                </div>
                                                <div class="mt-3">
                                                    <a href="{{ route('BusinessDetails') }}"
                                                        style="border:none; padding:0px; background-color:transparent;"
                                                        type="button">
                                                        <span class="badge badge-primary">
                                                            <i class="fa fa-fw fa-business-time"></i>
                                                            Edit Business Details
                                                        </span>
                                                    </a>
                                                    <a href="{{ route('BusinessReservations') }}"
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
                                                <span class="badge badge-primary">{{ ucfirst(Auth::user()->role) }}
                                                    Account</span>
                                                <div class="text-muted"><small>Joined
                                                        {{ date('d M Y', strtotime(Auth::user()->created_at)) }}</small>
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
                            <div class="row no-gutters row-bordered">
                                <div class="d-flex col-md align-items-center">
                                    <span class="card-body d-block text-body">
                                        <div class="text-muted small line-height-1">Total Reservations</div>
                                        <div class="text-xlarge">
                                            {{ number_format(Business::CountReservations(Auth::user()->id)) }}
                                        </div>
                                    </span>
                                </div>
                                <div class="d-flex col-md align-items-center">
                                    <span class="card-body d-block text-body">
                                        <div class="text-muted small line-height-1">Total Clients</div>
                                        <div class="text-xlarge">
                                            {{ number_format(Business::CountClients(Auth::user()->id)) }}
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="card-body">
                                <h6 class="mt-4 mb-3">Business Details</h6>
                                <table class="table user-view-table m-0">
                                    <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td>{{ Auth::user()->business_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Username:</td>
                                            <td>{{ Auth::user()->business_user_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ Auth::user()->business_email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone:</td>
                                            <td>{!! Auth::user()->business_phone !!}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table user-view-table m-0">
                                    <tbody>
                                        <tr>
                                            <td>Address:</td>
                                            <td>
                                                {{ Auth::user()->business_address }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Description:</td>
                                            <td>
                                                {{ Auth::user()->business_bio }}
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
</div>
