<form class="form" novalidate="">
    <div class="row">
        <div class="col">
            <button wire:click="Create()" wire:loading.attr='disabled' class="btn btn-primary" type="button">
                <span wire:loading wire:target="Create" class="spinner-border spinner-border-sm" role="status"
                    aria-hidden="true"></span>
                Create New Account
            </button>
            @if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
                @if (!$account->payouts_enabled)
                    <button wire:click="Complete()" wire:loading.attr='disabled' class="btn btn-primary" type="button">
                        <span wire:loading wire:target="Complete" class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                        Complete Your Account
                    </button>
                @endif
            @endif
            @if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
                @if ($account->charges_enabled and $account->payouts_enabled and $account->details_submitted)
                    <button wire:click="AccountLogin()" wire:loading.attr='disabled' class="btn btn-primary"
                        type="button">
                        <span wire:loading wire:target="AccountLogin" class="spinner-border spinner-border-sm"
                            role="status" aria-hidden="true"></span>
                        Account Login
                    </button>
                @endif
            @endif
        </div>
    </div>
</form>
