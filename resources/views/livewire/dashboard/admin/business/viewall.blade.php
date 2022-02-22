<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->

    <!--Begin::Business Status-->
    @include('livewire.dashboard.admin.business.BusinessStatus')
    <!--Begin::Business Status-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-3 col-lg-3">
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
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div class="dataTables_length" id="dataTable_length">
                                        <label>Visibility
                                            <select wire:model="visibility" name="dataTable_length"
                                                aria-controls="dataTable"
                                                class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="all">All</option>
                                                <option value="banned">Banned</option>
                                                <option value="active">Active</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <span wire:loading>Loading...</span>
                                    <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3">
                                    <div id="dataTable_filter" class="dataTables_filter">
                                        <label>Search:<input wire:model.debounce.1000ms='search' type="search"
                                                class="form-control form-control-sm" placeholder="Search here..."
                                                aria-controls="dataTable">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" cellspacing="0"
                                        role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th class="text-center">Clients</th>
                                                <th class="text-center">Verify</th>
                                                <th class="text-center">Email Status</th>
                                                <th class="text-center">Actions</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($business) > 0)
                                                @foreach ($business as $business_owner)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{!! substr($business_owner->name, 0, 8) !!}...</td>
                                                        <td>{!! $business_owner->email !!}</td>
                                                        <td class="text-center">
                                                            {{ number_format(Admin::CountBusinessClients($business_owner->id)) }}
                                                        </td>
                                                        <td class="text-center">
                                                            @if (Admin::BusinessEmailStatus($business_owner->id))
                                                                <button
                                                                    wire:click="UnVerifyEmail({{ $business_owner->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-danger">
                                                                        Unverify
                                                                    </span>
                                                                </button>
                                                            @else
                                                                <button
                                                                    wire:click="VerifyEmail({{ $business_owner->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-primary">
                                                                        Verify Now
                                                                    </span>
                                                                </button>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if (Admin::BusinessEmailStatus($business_owner->id))
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
                                                            @if ($business_owner->trashed())
                                                                <button
                                                                    wire:click="ActivateNow({{ $business_owner->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-primary">
                                                                        Activate
                                                                    </span>
                                                                </button>
                                                            @else
                                                                <button wire:click="BanNow({{ $business_owner->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-danger">
                                                                        Ban Now
                                                                    </span>
                                                                </button>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($business_owner->trashed())
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
                                                            <button wire:click="Edit({{ $business_owner->id }})"
                                                                style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-success">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </span>
                                                            </button>
                                                        </td>
                                                        <td class="text-center">
                                                            <button wire:click="Delete({{ $business_owner->id }})"
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
                                                    <td colspan="11">
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
                                        {{ $business->links() }}
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
