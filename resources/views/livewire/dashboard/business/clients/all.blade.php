<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <!--Begin::Clients Status-->
    @include('livewire.dashboard.business.clients.ClientStatus')
    <!--Begin::Clients Status-->
    @if (Business::CanViewClients(Auth::user()->id))
        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                <!-- Account details card-->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row mt-2">
                                    <div class="col-sm-12 col-md-10 col-lg-10">
                                        <div class="dataTables_length" id="dataTable_length">
                                            <label>Email Status
                                                <select wire:model="email_status" name="dataTable_length"
                                                    aria-controls="dataTable"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                    <option value="all">All</option>
                                                    <option value="verified">Verified</option>
                                                    <option value="unverified">Unverified</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                        <span wire:loading>Loading...</span>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" cellspacing="0"
                                            role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th class="text-center">Verify/Unverify</th>
                                                    <th class="text-center">Email Status</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center">Edit</th>
                                                    <th class="text-center">Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($clients) > 0)
                                                    @foreach ($clients as $client)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{!! $client->name !!}</td>
                                                            <td>{!! $client->email !!}</td>
                                                            <td class="text-center">
                                                                @if (Business::ClientIsVerified(Auth::user()->id, $client->id))
                                                                    <button
                                                                        wire:click="UnVerifyEmail({{ $client->id }})"
                                                                        style="padding:0px; border:none; background-color:transparent">
                                                                        <span class="badge badge-danger">
                                                                            Unverify
                                                                        </span>
                                                                    </button>
                                                                @else
                                                                    <button
                                                                        wire:click="VerifyEmail({{ $client->id }})"
                                                                        style="padding:0px; border:none; background-color:transparent">
                                                                        <span class="badge badge-primary">
                                                                            Verify Now
                                                                        </span>
                                                                    </button>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if (Business::ClientIsVerified(Auth::user()->id, $client->id))
                                                                    <span class="badge badge-primary">
                                                                        <i class="fas fa-check"></i> Verified
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-danger">
                                                                        <i class="fas fa-ban"></i> Unverified
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($client->trashed())
                                                                    <span class="badge badge-danger">
                                                                        <i class="fas fa-ban"></i> Banned
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-primary">
                                                                        <i class="fas fa-check"></i> Active
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                <button wire:click="Edit({{ $client->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-success">
                                                                        <i class="fas fa-edit"></i> Edit
                                                                    </span>
                                                                </button>
                                                            </td>
                                                            <td class="text-center">
                                                                <button wire:click="Delete({{ $client->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-danger">
                                                                        <i class="fas fa-trash-alt"></i> Delete
                                                                    </span>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="text-center">
                                                        <td colspan="7">
                                                            <strong>
                                                                No Data Found
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                            {{ $clients->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                <div class="alert alert-danger  text-center" role="alert">
                    <h4 class="alert-heading">
                        <i class="fas fa-exclamation-triangle fa-5x"></i>
                    </h4>
                    <strong class="mt-2">
                        You are not allowed to View the Clients.Please check your Abilities <a
                            href="{{ route('BusinessPermissions') }}">Here</a>
                    </strong>
                </div>
            </div>
        </div>
    @endif
</div>
