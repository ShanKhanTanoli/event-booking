<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    @if (Business::CanUpdatePricingPlans(Auth::user()->id))
        <div class="row flex-lg-nowrap">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Update Plan
                    </div>
                    <div class="card-body">
                        <form class="form" novalidate="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Plan Name</label>
                                        <input wire:model.defer="state.name" wire:loading.attr='disabled'
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            type="text" placeholder="Plan Name" value="{{ old('name') }}">
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
                                <div class="col d-flex">
                                    <!-- Save Changes button-->
                                    <button wire:click="UpdatePlan()" wire:loading.attr='disabled'
                                        class="btn btn-primary" type="button">
                                        <span wire:loading wire:target='UpdatePlan'
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
    @else
        <div class="row justify-content-center align-align-items-center">
            <div class="col-xl-12">
                <div class="alert alert-danger  text-center" role="alert">
                    <h4 class="alert-heading">
                        <i class="fas fa-exclamation-triangle fa-5x"></i>
                    </h4>
                    <strong class="mt-2">
                        You are not allowed to Update Plans.Please check your Abilities <a
                            href="{{ route('BusinessPermissions') }}">Here</a>
                    </strong>
                </div>
            </div>
        </div>
    @endif
</div>
