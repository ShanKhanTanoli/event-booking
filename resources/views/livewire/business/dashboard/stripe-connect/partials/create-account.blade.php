<form wire:submit='Create'>
    <div class="row">
        <div class="col-md-6">
            <div class="input-group input-group-static my-3">
                <label>{{ trans('business.account-type') }}</label>
                <select name="business_type" wire:model="business_type"
                    class="form-control @error('business_type') is-invalid @enderror">
                    <option value="">{{ trans('business.account-type') }}</option>
                    <option value="individual">{{ trans('business.account-individual') }}</option>
                    <option value="company">{{ trans('business.account-company') }}</option>
                </select>
                @error('business_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group input-group-static my-3">
                <label>{{ trans('business.account-country') }}</label>
                <select name="country" wire:model.defer="country"
                    class="form-control @error('country') is-invalid @enderror" id="country">
                    <option value="">{{ trans('business.account-country') }}</< /option>
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
        <div class="row">
            <div class="col text-center">
                <span wire:loading wire:target='business_type' class="spinner-border spinner-border" role="status"
                    aria-hidden="true">
                </span>
            </div>
        </div>
        @if ($business_type == 'company')
            <div class="col-md-6">
                <div class="input-group input-group-static my-3">
                    <label>{{ trans('business.account-email') }}</label>
                    <input wire:model.defer="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        type="email" placeholder="{{ trans('business.account-email') }}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-static my-3">
                    <label>{{ trans('business.account-company-name') }}</label>
                    <input wire:model.defer="company_name"
                        class="form-control @error('company_name') is-invalid @enderror" id="company_name"
                        type="company_name" placeholder="{{ trans('business.account-company-name') }}" />
                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        @endif
        @if ($business_type == 'individual')
            <div class="col-md-6">
                <div class="input-group input-group-static my-3">
                    <label>{{ trans('business.account-business-fname') }}</label>
                    <input wire:model.defer="first_name" class="form-control @error('first_name') is-invalid @enderror"
                        id="first_name" type="first_name"
                        placeholder="{{ trans('business.account-business-fname') }}" />
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-static my-3">
                    <label>{{ trans('business.account-business-lname') }}</label>
                    <input wire:model.defer="last_name" class="form-control @error('last_name') is-invalid @enderror"
                        id="last_name" type="last_name"
                        placeholder="{{ trans('business.account-business-lname') }}" />
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group input-group-static my-3">
                    <label>{{ trans('business.account-email') }}</label>
                    <input wire:model.defer="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        type="email" placeholder="{{ trans('business.account-email') }}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <div class="input-group input-group-static my-3">
                <label>{{ trans('business.account-phone') }}</label>
                <input wire:model.defer="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    type="phone" placeholder="{{ trans('business.account-phone') }}" />
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group input-group-static my-3">
                <label>{{ trans('business.account-dob') }}"</label>
                <input wire:model.defer="dob" class="form-control @error('dob') is-invalid @enderror" type="date"
                    placeholder="{{ trans('business.account-dob') }}" />
                @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                <span wire:loading wire:target='Create' class="spinner-border spinner-border-sm" role="status"
                    aria-hidden="true"></span>
                {{ trans('business.craete-account-btn') }}
            </button>
        </div>
    </div>
</form>
