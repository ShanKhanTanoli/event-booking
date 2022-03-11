<div class="row flex-lg-nowrap">
    @if (Business::CanCreateClient($find_business->id))
    <div class="card">
        @else
        <div class="card" style="width: 100%;">
        @endif
        <div class="card-body">
            <div class="col-12 col-sm-auto mb-3  justify-content-center">
                <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded"
                        style="height: 140px; background-color: rgb(233, 236, 239);">
                        @if (!is_null($find_business->avatar))
                            <img style="width:100%;"
                                src="{{ asset('dashboard/images/business/avatar/' . $find_business->avatar) }}"
                                alt="Logo">
                        @else
                            <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{!! $find_business->name !!}</h4>
                    <p class="mb-0">
                        <span class="text-muted">
                            {{ __('@' . $find_business->user_name) }}
                        </span>
                    </p>
                </div>
                <div class="text-center text-sm-right">
                    <span class="badge badge-primary">{{ ucfirst($find_business->role) }}
                        Account</span>
                    <div class="text-muted"><small>Joined
                            {{ date('d M Y', strtotime($find_business->created_at)) }}</small>
                    </div>
                </div>
            </div>
            <table class="table user-view-table m-0">
                <tbody>
                    <tr>
                        <td>
                            <strong>
                                Name :
                            </strong>
                            {{ $find_business->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Email :
                            </strong>
                            {{ $find_business->email }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Phone :
                            </strong>
                            {!! $find_business->phone !!}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>
                                Address :
                            </strong>
                            {{ $find_business->address }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
