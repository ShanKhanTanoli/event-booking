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
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form class="form" novalidate="">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Plan Name</label>
                                                                <input wire:model.defer="state.name"
                                                                    wire:loading.attr='disabled'
                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                    id="name" type="text" placeholder="Plan Name"
                                                                    value="{{ old('name') }}">
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Description</label>
                                                                        <textarea wire:model.defer="state.description"
                                                                            wire:loading.attr='disabled'
                                                                            class="form-control @error('description') is-invalid @enderror"
                                                                            rows="5"
                                                                            placeholder="Description">{{ old('description') }}</textarea>
                                                                        @error('description')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <label>Reservations (Business can Create Number
                                                                            of Reservations)</label>
                                                                        <input wire:model.defer="state.reservations"
                                                                            wire:loading.attr='disabled'
                                                                            class="form-control @error('reservations') is-invalid @enderror"
                                                                            id="reservations" type="number"
                                                                            placeholder="Number of Reservations"
                                                                            reservations="{{ old('reservations') }}">
                                                                        @error('reservations')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col d-flex">
                                                            <!-- Save Changes button-->
                                                            <button wire:click="UpdatePlan()"
                                                                wire:loading.attr='disabled' class="btn btn-primary"
                                                                type="button">
                                                                <span wire:loading wire:target='UpdatePlan'
                                                                    class="spinner-border spinner-border-sm"
                                                                    role="status" aria-hidden="true"></span>
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
        </div>
    </div>
</div>
