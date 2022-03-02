<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <div class="col mb-3">
            <div class="card">
                <div class="card-header">
                    Add Pricing Plan
                </div>
                <div class="card-body">
                    <form class="form" novalidate="">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Plan Name</label>
                                    <input wire:model.defer="state.name" wire:loading.attr='disabled'
                                        class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                                        placeholder="Plan Name" value="{{ old('name') }}">
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
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea wire:model.defer="state.description" wire:loading.attr='disabled'
                                        class="form-control @error('description') is-invalid @enderror" rows="5"
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
                                    <label>Plan Price
                                        ({{ strtoupper(Settings::Currency()) }})</label>
                                    <input wire:model.defer="state.price" wire:loading.attr='disabled'
                                        class="form-control @error('price') is-invalid @enderror" id="price"
                                        type="number"
                                        placeholder="Plan price in  {{ strtoupper(Settings::Currency()) }}"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex">
                                <button wire:click="UpdatePlan()" wire:loading.attr='disabled' class="btn btn-primary"
                                    type="button">
                                    <span wire:loading wire:target='UpdatePlan' class="spinner-border spinner-border-sm"
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
