<form class="user">
    <div class="form-group">
        <input id="name" wire:model.defer='state.name' type="text"
            class="form-control form-control-user @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" autocomplete="name" placeholder="Enter Full Name" autofocus required />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input id="email" wire:model.defer='state.email' type="email"
            class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" autocomplete="email" placeholder="Email Address" autofocus required />
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input wire:model.defer="state.password" id="password" type="password"
            class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
            autocomplete="current-password" placeholder="Password" required />
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <input wire:model.defer="state.password_confirmation" id="password_confirmation" type="password"
            class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation" autocomplete="current-password" placeholder="Confirm Password" required />
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button wire:click='SaveBusiness' wire:loading.attr="disabled" type="button" class="btn btn-primary btn-user btn-block">
        <span wire:loading class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        <span wire:loading class="sr-only">Loading...</span>
        {{ __('Register') }}
    </button>
</form>
