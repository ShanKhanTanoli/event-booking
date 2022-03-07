<div class="modal" id="create-booking" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            @if (Business::CountClients(Auth::user()->id) > 0)
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="col p-0">
                                <strong>
                                    Create Booking
                                </strong>
                            </div>
                            <div class="col text-right p-0">
                                <button type="button" data-dismiss="modal"
                                    style="padding:0px; border:none; background-color:transparent">
                                    <i class="fas fa-times-circle text-danger"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" novalidate="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Select Client</label>
                                        <select wire:model.defer="client"
                                            class="form-control @error('client') is-invalid @enderror">
                                            <option value="">Select Client</option>
                                            @if ($clients = Business::Clients(Auth::user()->id))
                                                @foreach ($clients->get() as $client)
                                                    <option value="{{ $client->id }}">
                                                        <strong>
                                                            {{ $client->name }} - {{ $client->email }}
                                                        </strong>
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('client')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex">
                                    <button wire:click="CreateBooking()" wire:loading.attr='disabled'
                                        class="btn btn-primary" type="button">
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true"></span>
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="col p-0">
                                <strong>
                                    Create Booking
                                </strong>
                            </div>
                            <div class="col text-right p-0">
                                <button type="button" data-dismiss="modal"
                                    style="padding:0px; border:none; background-color:transparent">
                                    <i class="fas fa-times-circle text-danger"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <strong class="text-danger">
                                No clients Found.
                            </strong>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
