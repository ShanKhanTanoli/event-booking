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

                                            @if (!is_null($find_business->business_avatar))
                                                <img style="width:100%;"
                                                    src="{{ asset('dashboard/images/business/businesslogos/' . $find_business->business_avatar) }}"
                                                    alt="Logo">
                                            @else
                                                <span
                                                    style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! $find_business->business_name !!}</h4>
                                        <p class="mb-0">
                                            <span class="text-muted">
                                                {{ __('@' . $find_business->business_user_name) }}
                                            </span>
                                        </p>
                                    </div>
                                    <div class="text-center text-sm-right">
                                        <span class="badge badge-primary">{{ ucfirst($find_business->role) }}</span>
                                        <div class="text-muted"><small>Joined
                                                {{ date('d M Y', strtotime($find_business->created_at)) }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="mt-4 mb-3 text-center">Business Details</h6>
                        <table class="table user-view-table m-0 text-center">
                            <tbody>
                                <tr>
                                    <td>{{ $find_business->business_name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $find_business->business_email }}</td>
                                </tr>
                                <tr>
                                    <td>{!! $find_business->business_phone !!}</td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ $find_business->business_address }}
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
