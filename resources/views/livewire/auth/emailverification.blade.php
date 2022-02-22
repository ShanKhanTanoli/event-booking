<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Verify Your Email Address') }}</div>
            <div class="card-body">
                <!--Begin::Alerts Notifications-->
                @include('errors.messages')
                <!--End::Alerts Notifications-->

                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        <strong>
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </strong>
                    </div>
                @endif
                <strong>
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email then click on the link below.') }}
                </strong>
                <form class="mt-4">
                    <button type="button" wire:click='ResendVerification' wire:loading.attr="disabled"
                        class="btn btn-primary">
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                        <span wire:loading class="sr-only">Loading...</span>
                        <strong>
                            {{ __('Click here to send a Verification Link') }}
                        </strong>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
