<div class="container-fluid">
    <!--Begin::Alerts Notifications-->
    @include('errors.messages')
    <!--End::Alerts Notifications-->
    <!--Begin::Stripe Status-->
    @include('livewire.dashboard.business.stripe.StripeStatus')
    <!--End::Stripe Status-->
    <div class="row flex-lg-nowrap">
        <div class="col">
            <div class="row">
                <div class="col mb-3">
                    <div class="card">
                        <div class="card-header">
                            Complete your profile
                        </div>
                        <div class="card-body">
                            <form class="form" novalidate="">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Business Type</label>
                                            <select name="business_type" wire:model="business_type"
                                                class="form-control @error('business_type') is-invalid @enderror">
                                                <option value="">Select Business Type</option>
                                                <option value="individual">Individual</option>
                                                <option value="company">Company</option>
                                            </select>
                                            @error('business_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select name="country" wire:model.defer="country"
                                                class="form-control @error('country') is-invalid @enderror"
                                                id="country">
                                                <option value="">Select Country</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="CA">Canada</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="EE">Estonia</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="DE">Germany</option>
                                                <option value="GR">Greece</option>
                                                <option value="HK">Hong Kong SAR China</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IT">Italy</option>
                                                <option value="JP">Japan</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MT">Malta</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NO">Norway</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="RO">Romania</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="ES">Spain</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                            </select>
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <span wire:loading wire:target='business_type'
                                            class="spinner-border spinner-border" role="status" aria-hidden="true">
                                        </span>
                                    </div>
                                </div>
                                @if ($business_type == 'company')
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input wire:model.defer="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    type="email" placeholder="Enter Email" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input wire:model.defer="company_name"
                                                    class="form-control @error('company_name') is-invalid @enderror"
                                                    id="company_name" type="company_name" placeholder="Company Name" />
                                                @error('company_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($business_type == 'individual')
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input wire:model.defer="first_name"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    id="first_name" type="first_name" placeholder="First Name" />
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input wire:model.defer="last_name"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    id="last_name" type="last_name" placeholder="Last Name" />
                                                @error('last_name')
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
                                                <label>Email</label>
                                                <input wire:model.defer="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    type="email" placeholder="Enter Email" />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input wire:model.defer="phone"
                                                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                                                    type="phone" placeholder="Enter Phone Number" />
                                                @error('phone')
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
                                                <label>Date of Birth</label>
                                                <input wire:model.defer="dob"
                                                    class="form-control @error('dob') is-invalid @enderror" type="date"
                                                    placeholder="Enter Day of Birth" />
                                                @error('dob')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col">
                                        @if (is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
                                            <button wire:click="Create()" wire:loading.attr='disabled'
                                                class="btn btn-primary" type="button">
                                                <span wire:loading wire:target="Create"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Create Account
                                            </button>
                                        @else
                                            <button wire:click="Create()" wire:loading.attr='disabled'
                                                class="btn btn-primary" type="button">
                                                <span wire:loading wire:target="Create"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Create New Account
                                            </button>
                                        @endif
                                        @if (Business::StripeConnectAccountID(Auth::user()->id))
                                            @if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
                                                @if (!$account->payouts_enabled)
                                                    <button wire:click="Complete()" wire:loading.attr='disabled'
                                                        class="btn btn-primary" type="button">
                                                        <span wire:loading wire:target="Complete"
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        Complete Your Account
                                                    </button>
                                                @endif
                                            @endif
                                        @endif
                                        @if (Business::StripeConnectAccountID(Auth::user()->id))
                                            @if (!is_null($account = Stripe::RetrieveAccount(Auth::user()->account_id)))
                                                <button wire:click="AccountLogin()" wire:loading.attr='disabled'
                                                    class="btn btn-primary" type="button">
                                                    <span wire:loading wire:target="AccountLogin"
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    Account Login
                                                </button>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
