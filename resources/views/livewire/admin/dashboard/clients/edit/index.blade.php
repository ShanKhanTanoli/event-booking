<div class="container-fluid">
    @include('errors.alerts')
    <!--Begin::Tab-Menu-->
    @include('livewire.admin.dashboard.clients.partials.tab-menu')
    <!--Begin::Tab-Menu-->
    <div class="row mt-3">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            Update Client Account
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="name">Name</label>
                                        <input type="text" wire:model.defer='name' value="{{ old('name') }}"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            placeholder="Enter Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="user_name">User Name</label>
                                        <input type="text" wire:model.defer='user_name' value="{{ old('user_name') }}"
                                            class="form-control  @error('user_name') is-invalid @enderror"
                                            placeholder="Enter User Name">
                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="number">Number</label>
                                        <input type="text" wire:model.defer='number' value="{{ old('number') }}"
                                            class="form-control  @error('number') is-invalid @enderror"
                                            placeholder="Enter Number">
                                        @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group input-group-static my-3">
                                        <label for="email">Email</label>
                                        <input type="text" wire:model.defer='email' value="{{ old('email') }}"
                                            class="form-control  @error('email') is-invalid @enderror"
                                            placeholder="Enter Email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group input-group-static my-3">
                                        <label for="parent_business_id">Joined Business</label>
                                        <select wire:model.defer='parent_business_id'
                                            class="form-control  @error('parent_business_id') is-invalid @enderror">
                                            <option value="">Select Business</option>
                                            @forelse (Business::Latest()->get() as $business)
                                                <option value="{{ $business->id }}">
                                                    Name : {{ $business->name }}
                                                    Email : {{ $business->email }}
                                                </option>
                                            @empty
                                                <option value=""></option>
                                            @endforelse
                                        </select>
                                        @error('parent_business_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary" wire:attr='disabled'
                                        wire:click='Update'>
                                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                            aria-hidden="true">
                                        </span>
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
