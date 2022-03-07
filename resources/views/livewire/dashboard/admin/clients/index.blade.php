<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->

    <!--Begin::Clients Status-->
    @include('livewire.dashboard.admin.clients.partials.client-status')
    <!--Begin::Clients Status-->

    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row mt-2">
                                <div class="col-sm-12 col-md-4 col-lg-4">
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
                                <div class="col-sm-12 col-md-4 col-lg-4">
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
                                <div class="col-sm-12 col-md-4 col-lg-4">
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
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th class="text-center">Email Verify</th>
                                                <th class="text-center">Visibility</th>
                                                <th class="text-center">Business</th>
                                                <th class="text-center">View</th>
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
                                                            @if (Admin::ClientEmailStatus($client->id))
                                                                <button wire:click="UnVerifyEmail({{ $client->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-danger">
                                                                        <span wire:loading
                                                                            wire:target='UnVerifyEmail({{ $client->id }})'
                                                                            class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                            <i class="fas fa-user-slash"></i>
                                                                        Unverify
                                                                    </span>
                                                                </button>
                                                            @else
                                                                <button wire:click="VerifyEmail({{ $client->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-primary">
                                                                        <span wire:loading
                                                                            wire:target='VerifyEmail({{ $client->id }})'
                                                                            class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                            <i class="fas fa-user-check"></i>
                                                                        Verify Now
                                                                    </span>
                                                                </button>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            @if ($client->trashed())
                                                                <button wire:click="ActivateNow({{ $client->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-primary">
                                                                        <span wire:loading
                                                                            wire:target='ActivateNow({{ $client->id }})'
                                                                            class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                            <i class="fas fa-check"></i>
                                                                        Activate
                                                                    </span>
                                                                </button>
                                                            @else
                                                                <button wire:click="BanNow({{ $client->id }})"
                                                                    style="padding:0px; border:none; background-color:transparent">
                                                                    <span class="badge badge-danger">
                                                                        <span wire:loading
                                                                            wire:target='BanNow({{ $client->id }})'
                                                                            class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                        <i class="fas fa-ban"></i>
                                                                        Ban Now
                                                                    </span>
                                                                </button>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <strong>
                                                                @if($business = Client::JoinedBusiness($client->id))
                                                                
                                                                @if(strlen($business->name) < 8)
                                                                {{ $business->name }}
                                                                @else
                                                                {{ $business->name }}...
                                                                @endif

                                                                @else
                                                                    No Business
                                                                @endif
                                                            </strong>
                                                        </td>
                                                        @if($business = Business::Is($client->created_by))
                                                        <td class="text-center">
                                                            <a href="{{ route('AdminEditBusiness',$business->reg_no) }}"
                                                                style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-primary">
                                                                <i class="fas fa-eye"></i>
                                                                    View Business
                                                                </span>
                                                            </a>
                                                        </td>
                                                        @else
                                                        <td class="text-center">
                                                            <button style="padding:0px; border:none; background-color:transparent" disabled>
                                                                <span class="badge badge-danger">
                                                                        <i class="fas fa-check"></i>
                                                                    By Admin
                                                                </span>
                                                            </button>
                                                        </td>
                                                        @endif
                                                        <td class="text-center">
                                                            <a href="{{ route('AdminEditClient', $client->reg_no) }}" style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-success">
                                                                    <i class="fas fa-edit"></i>
                                                                    Edit
                                                                </span>
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <button wire:click="DeleteNow({{ $client->id }})"
                                                                style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-danger">
                                                                    <span wire:loading
                                                                            wire:target='DeleteNow({{ $client->id }})'
                                                                            class="spinner-border spinner-border-sm"
                                                                            role="status" aria-hidden="true"></span>
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </span>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr class="text-center">
                                                    <td colspan="8">
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
</div>
