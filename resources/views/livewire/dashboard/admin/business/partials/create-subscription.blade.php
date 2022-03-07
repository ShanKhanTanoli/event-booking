<!-- The Modal -->
<div class="modal" id="SubscriptionModal" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="col p-0">
                            Create Subscription
                        </div>
                        <div class="col text-right p-0">
                            <button type="button" data-dismiss="modal"
                                style="border:none; padding:0px; background-color:transparent;">
                                <i class="fa fa-fw fa-times-circle text-danger"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($plans = Admin::Plans(Auth::user()->id))
                    <form class="form" novalidate="">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Select Plan</label>
                                    <select wire:model.defer="price_id"
                                        class="form-control @error('price_id') is-invalid @enderror">
                                        <option value="">Select Plan</option>
                                        @foreach ($plans as $plan)
                                            <option value="{{ $plan->price_id }}">{!! $plan->name !!} {!! $plan->price !!} {{ strtoupper(Settings::Currency()) }}</option> 
                                        @endforeach
                                    </select>
                                    @error('price_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex">
                                <button wire:click="CreateSubscription()" class="btn btn-primary" type="button"
                                    wire:loading.attr="disabled">
                                    <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Create Subscription
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <strong class="text-danger">
                        Admin does not have any Pricing Plan.
                    </strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
