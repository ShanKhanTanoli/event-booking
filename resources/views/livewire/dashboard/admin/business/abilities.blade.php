<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <!--Begin::Sidebar-->
        @include('livewire.dashboard.admin.business.partials.sidebar')
        <!--Begin::Sidebar-->
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            {!! $business->name  !!} Permissions
                        </div>
                        <div class="card-body">
                            <form class="form" novalidate="">
                                <div class="row">
                                    <div class="col-12 col-sm-12 mb-3">
                                        <div class="mb-4">
                                            <b>Abilities & Permissions</b>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <b>Reservations</b>
                                                <div class="custom-controls-stacked">
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_view_reservation"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_view_reservation') is-invalid @enderror"
                                                            id="can_view_reservation"
                                                            @if (Admin::BusinessCanViewReservations($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label" for="can_view_reservation">
                                                            Can View Reservations
                                                        </label>
                                                        @error('can_view_reservation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_create_reservation"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_create_reservation') is-invalid @enderror"
                                                            id="can_create_reservation"
                                                            @if (Admin::BusinessCanCreateReservations($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label"
                                                            for="can_create_reservation">
                                                            Can Create Reservations
                                                        </label>
                                                        @error('can_create_reservation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_update_reservation"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_update_reservation') is-invalid @enderror"
                                                            id="can_update_reservation"
                                                            @if (Admin::BusinessCanUpdateReservations($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label"
                                                            for="can_update_reservation">
                                                            Can Update Reservations
                                                        </label>
                                                        @error('can_update_reservation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_delete_reservation"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_delete_reservation') is-invalid @enderror"
                                                            id="can_delete_reservation"
                                                            @if (Admin::BusinessCanDeleteReservations($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label"
                                                            for="can_delete_reservation">
                                                            Can Delete Reservations
                                                        </label>
                                                        @error('can_delete_reservation')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <b>Clients</b>
                                                <div class="custom-controls-stacked">
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_view_client" type="checkbox"
                                                            class="custom-control-input  @error('can_view_client') is-invalid @enderror"
                                                            id="can_view_client"
                                                            @if (Admin::BusinessCanViewClients($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label" for="can_view_client">
                                                            Can View Clients
                                                        </label>
                                                        @error('can_view_client')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_create_client"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_create_client') is-invalid @enderror"
                                                            id="can_create_client"
                                                            @if (Admin::BusinessCanCreateClients($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label" for="can_create_client">
                                                            Can Create Clients
                                                        </label>
                                                        @error('can_create_client')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_update_client"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_update_client') is-invalid @enderror"
                                                            id="can_update_client"
                                                            @if (Admin::BusinessCanUpdateClients($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label" for="can_update_client">
                                                            Can Update Clients
                                                        </label>
                                                        @error('can_update_client')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_delete_client"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_delete_client') is-invalid @enderror"
                                                            id="can_delete_client"
                                                            @if (Admin::BusinessCanDeleteClients($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label" for="can_delete_client">
                                                            Can Delete Clients
                                                        </label>
                                                        @error('can_delete_client')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_verify_client"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_verify_client') is-invalid @enderror"
                                                            id="can_verify_client"
                                                            @if (Admin::BusinessCanVerifyClients($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label" for="can_verify_client">
                                                            Can Verify Clients
                                                        </label>
                                                        @error('can_verify_client')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_un_verify_client"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_un_verify_client') is-invalid @enderror"
                                                            id="can_un_verify_client"
                                                            @if (Admin::BusinessCanUnVerifyClients($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label" for="can_un_verify_client">
                                                            Can Un-Verify Clients
                                                        </label>
                                                        @error('can_verify_client')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col">
                                                <b>Pricing Plans</b>
                                                <div class="custom-controls-stacked">
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_view_pricing_plan"
                                                            type="checkbox"
                                                            class="custom-control-input  @error('can_view_pricing_plan') is-invalid @enderror"
                                                            id="can_view_pricing_plan"
                                                            @if (Admin::BusinessCanViewPricingPlans($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label" for="can_view_pricing_plan">
                                                            Can View Pricing Plans
                                                        </label>
                                                        @error('can_view_pricing_plan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_create_pricing_plan"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_create_pricing_plan') is-invalid @enderror"
                                                            id="can_create_pricing_plan"
                                                            @if (Admin::BusinessCanCreatePricingPlans($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label"
                                                            for="can_create_pricing_plan">
                                                            Can Create Pricing Plans
                                                        </label>
                                                        @error('can_create_pricing_plan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="custom-control custom-checkbox mt-4">
                                                        <input wire:model.defer="state.can_update_pricing_plan"
                                                            type="checkbox"
                                                            class="custom-control-input @error('can_update_pricing_plan') is-invalid @enderror"
                                                            id="can_update_pricing_plan"
                                                            @if (Admin::BusinessCanUpdatePricingPlans($business->id)) checked="checked" @endif>
                                                        <label class="custom-control-label"
                                                            for="can_update_pricing_plan">
                                                            Can Update Pricing Plans
                                                        </label>
                                                        @error('can_update_pricing_plan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col d-flex">
                                        <!-- Save changes button-->
                                        <button wire:click="Update()" wire:loading.attr='disabled'
                                            class="btn btn-primary" type="button">
                                            <span wire:loading wire:target='Update'
                                                class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></span>
                                            Save Changes
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
