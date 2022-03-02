<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="col p-0">
                                <strong>
                                    Allowed Permissions
                                </strong>
                            </div>
                            <div class="col p-0" style="text-align:right;">
                                <a href="{{ route('BusinessDashboard') }}" style="padding:0px; border:none; background-color:transparent">
                                    <span class="badge badge-primary">
                                        <i class="fas fa-tachometer-alt"></i> Dashboard
                                    </span>
                                </a>
                                <a href="{{ route('BusinessProfile') }}" style="padding:0px; border:none; background-color:transparent">
                                    <span class="badge badge-primary">
                                        <i class="fas fa-user-cog"></i> Profile
                                    </span>
                                </a>
                            </div>
                        </div>
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
                                            <th class="text-center" style="border:none;">UnVerify</th>
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
                                                @if (Business::CanUnVerifyClient(Auth::user()->id))
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
                                                <span class="fa fa-times text-light">
                                                </span>
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
