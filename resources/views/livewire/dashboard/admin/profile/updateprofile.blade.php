<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <div class="row justify-content-center align-align-items-center">
        <div class="col-xl-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Update Profile</div>
                <div class="card-body">
                    <form wire:submit.prevent="UpdateProfile">
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Full name</label>
                                <input wire:model.defer="state.name"
                                    class="form-control @error('name') is-invalid @enderror" id="name" type="text"
                                    placeholder="Enter your last name" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Form Group-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="email">Email</label>
                                <input wire:model.defer="state.email"
                                    class="form-control @error('email') is-invalid @enderror" id="email" type="email"
                                    placeholder="Enter your email address" value="{{ Auth::user()->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary">
                            <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            Save changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
