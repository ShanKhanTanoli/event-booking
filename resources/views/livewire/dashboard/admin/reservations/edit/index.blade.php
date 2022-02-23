<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row flex-lg-nowrap">
        <div class="col mb-3">
            <div class="card">
                <div class="card-header">
                    Update Reservation
                </div>
                <div class="card-body">
                    <form class="form" novalidate="">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Reservation Name</label>
                                    <input wire:model.defer="state.name"
                                        class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                                        placeholder="Gym Reservation" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Reservation Status</label>
                                    <select wire:model.defer="state.status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select Status</option>
                                        <option @if ($reservation->status == 'active') selected @endif value="active">
                                            Active</option>
                                        <option @if ($reservation->status == 'archived') selected @endif value="archived">
                                            Archived</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @if ($reservation->status != 'banned')
                            <div class="row">
                                <div class="col d-flex">
                                    <!-- Save changes button-->
                                    <button wire:click="Update()" wire:loading.attr='disabled' class="btn btn-primary"
                                        type="button">
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Save Changes
                                    </button>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
