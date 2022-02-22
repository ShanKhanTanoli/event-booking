@if (!Business::StripeConnectAccountID(Auth::user()->id))
<div class="alert alert-warning">
    <strong>
        <i class="fas fa-info-circle"></i> Seems like You don't have an Account yet.Please create an account in order
        get paid.
    </strong>
</div>
@else
@if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))

<!--Begin::If Charged are disabled-->
@if (!$account->charges_enabled)
<div class="alert alert-danger">
    <strong>
        <i class="fas fa-exclamation-triangle"></i>
        Charged are disabled.Please complete your account.
    </strong>
</div>
@endif
<!--End::If Charged are disabled-->

<!--Begin::If Payouts are disabled-->
@if (!$account->payouts_enabled)
<div class="alert alert-danger">
    <strong>
        <i class="fas fa-exclamation-triangle"></i>
        Payouts are disabled.Please complete your account.
    </strong>
</div>
@endif
<!--End::If Payouts are disabled-->

<!--Begin::If Details are submitted-->
@if (!$account->details_submitted)
<div class="alert alert-danger">
    <strong>
        <i class="fas fa-exclamation-triangle"></i>
        Details are not submitted.Please complete your account.
    </strong>
</div>
@endif
<!--End::If Details are submitted-->

<!--Begin::If Account is ready for Payout-->
@if ($account->charges_enabled and $account->payouts_enabled and $account->details_submitted)
<div class="alert alert-primary">
    <strong>
        <i class="fas fa-info-circle"></i> Great! Your Account is ready to use.
        @if (Business::StripeConnectAccountID(Auth::user()->id))
        @if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
        <button wire:click="AccountLogin()" wire:loading.attr='disabled' class="btn btn-link" type="button">
            <span wire:loading wire:target="AccountLogin" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Account Login
        </button>
        @endif
        @endif
    </strong>
</div>
@endif
<!--End::If Account is ready for Payout-->

@endif
@endif