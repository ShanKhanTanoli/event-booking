<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->

    <!--Begin::Plans Status-->
    @include('livewire.dashboard.admin.pricingplans.partials.plans-status')
    <!--Begin::Plans Status-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="col-sm-12 col-xl-12">
                                <table class="table table-bordered dataTable" id="dataTable" cellspacing="0" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Duration</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Archive</th>
                                            <th class="text-center">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($plans)
                                            @foreach ($plans as $plan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <strong>
                                                            {!! substr(ucfirst($plan->name), 0, 15) !!}
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            {!! substr($plan->description, 0, 15) !!}...
                                                        </strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <strong>
                                                            {{ $plan->price }}
                                                            {{ strtoupper(Settings::Currency()) }}
                                                        </strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary">
                                                            <i class="fas fa-calendar-alt"></i>
                                                            {{ $plan->invoice_period }}
                                                            {{ ucfirst($plan->invoice_interval) }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($plan->is_active)
                                                            <span class="badge badge-primary">
                                                                <i class="fas fa-check"></i> Active
                                                            </span>
                                                        @else
                                                            <span class="badge badge-danger">
                                                                <i class="fas fa-exclamation-triangle"></i>
                                                                Archived
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($plan->is_active)
                                                            <button type="button" wire:loading.attr='disabled'
                                                                wire:click="ArchivePlan('{{ $plan->id }}')"
                                                                style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-danger">
                                                                    <span wire:loading
                                                                        wire:target="ArchivePlan('{{ $plan->id }}')"
                                                                        class="spinner-border spinner-border-sm"
                                                                        role="status" aria-hidden="true"></span>
                                                                    <i class="fas fa-archive"></i> Archive
                                                                </span>
                                                            </button>
                                                        @else
                                                            <button type="button" wire:loading.attr='disabled'
                                                                wire:click="ActivatePlan('{{ $plan->id }}')"
                                                                style="padding:0px; border:none; background-color:transparent">
                                                                <span class="badge badge-success">
                                                                    <span wire:loading
                                                                        wire:target="ActivatePlan('{{ $plan->id }}')"
                                                                        class="spinner-border spinner-border-sm"
                                                                        role="status" aria-hidden="true"></span>
                                                                    <i class="fas fa-check"></i> Activate
                                                                </span>
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" wire:loading.attr='disabled'
                                                            wire:click="EditPlan('{{ $plan->price_id }}')"
                                                            style="padding:0px; border:none; background-color:transparent">
                                                            <span class="badge badge-primary">
                                                                <span wire:loading
                                                                    wire:target="EditPlan('{{ $plan->price_id }}')"
                                                                    class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
                                                                <i class="fas fa-edit"></i> Edit
                                                            </span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="12">
                                                    <strong>
                                                        No Data Found
                                                    </strong>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                @if (count($plans) != Admin::CountPlans(Auth::user()->id))
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 mt-2 mb-2 text-center">
                                            <button wire:click='LoadMore' class="btn btn-sm btn-primary">
                                                <span wire:loading wire:target='LoadMore'
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Load More
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
