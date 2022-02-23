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
                                                <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                                                    <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! Auth::user()->name !!}</h4>
                                                <p class="mb-0">
                                                    <a class="text-muted" href=" {{ route('ViewBusiness', Auth::user()->business_user_name) }}">
                                                        {{ __('@' . Auth::user()->business_user_name) }}
                                                        <button class="ml-2" style="border:none; padding:0px; background-color:transparent;" type="button">
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
                                                        <strong class="text-primary" style="text-decoration: underline;">
                                                            {{ route('RegisterAsClient', Auth::user()->business_user_name) }}
                                                        </strong>
                                                        to register.
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-right">
                                                <span class="badge badge-primary">{{ ucfirst(Auth::user()->role) }}</span>
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
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table">
                                        <tbody>
                                            <tr style="border:none;">
                                                <th style="border:none;">Module</th>
                                                <th class="text-center" style="border:none;">View</th>
                                                <th class="text-center" style="border:none;">Create</th>
                                                <th class="text-center" style="border:none;">Update</th>
                                                <th class="text-center" style="border:none;">Verify</th>
                                                <th class="text-center" style="border:none;">Add</th>
                                                <th class="text-center" style="border:none;">Remove</th>
                                                <th class="text-center" style="border:none;">Delete</th>
                                            </tr>
                                            <tr>
                                                <td>Clients</td>
                                                <td class="text-center">
                                                    @if (Business::CanViewClients(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanCreateClient(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanUpdateClient(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanVerifyClient(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanAddClient(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanRemoveClient(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanDeleteClient(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table">
                                        <tbody>
                                            <tr style="border:none;">
                                                <th style="border:none;">Module</th>
                                                <th class="text-center" style="border:none;">View</th>
                                                <th class="text-center" style="border:none;">Create</th>
                                                <th class="text-center" style="border:none;">Update</th>
                                                <th class="text-center" style="border:none;">Delete</th>
                                            </tr>
                                            <tr>
                                                <td>Reservations</td>
                                                <td class="text-center">
                                                    @if (Business::CanViewReservations(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanCreateReservation(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanUpdateReservation(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanDeleteReservation(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr class="m-0">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table card-table">
                                        <tbody>
                                            <tr style="border:none;">
                                                <th style="border:none;">Module</th>
                                                <th class="text-center" style="border:none;">View</th>
                                                <th class="text-center" style="border:none;">Create</th>
                                                <th class="text-center" style="border:none;">Update</th>
                                                <th class="text-center" style="border:none;">Delete</th>
                                            </tr>
                                            <tr>
                                                <td>Plans & Pricing</td>
                                                <td class="text-center">
                                                    @if (Business::CanViewPricingPlans(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanCreatePricingPlans(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanUpdatePricingPlans(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (Business::CanDeletePricingPlans(Auth::user()->id))
                                                    <span class="fa fa-check text-primary">
                                                    </span>
                                                    @else
                                                    <span class="fa fa-times text-light">
                                                    </span>
                                                    @endif
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
</div>