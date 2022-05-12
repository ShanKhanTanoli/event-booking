<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include(
            'livewire.admin.dashboard.business.partials.tab-menu'
        )
        <!--Begin::Sidebar-->
        <div class="col-lg-10 mt-lg-0 mt-4">
            <!--Begin::Alerts-->
            @include('errors.alerts')
            <!--End::Alerts-->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">
                                    {{ trans('admin.send-mail') }}
                                </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container">
                                <form wire:submit.prevent='SendMail()'>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="subject">{{ trans('admin.mail-subject') }}</label>
                                                <input type="text" wire:model.defer='subject'
                                                    value="{{ old('subject') }}"
                                                    class="form-control  @error('subject') is-invalid @enderror"
                                                    placeholder="{{ trans('admin.mail-subject') }}">
                                                @error('subject')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-group input-group-static my-3">
                                                <label for="message">{{ trans('admin.mail-message') }}</label>
                                                <textarea wire:model.defer='message' class="form-control  @error('message') is-invalid @enderror"
                                                    placeholder="{{ trans('admin.mail-message') }}">
                                                        {{ old('message') }}
                                                    </textarea>
                                                @error('message')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                                                <span wire:loading class="spinner-border spinner-border-sm"
                                                    role="status" aria-hidden="true"></span>
                                                {{ trans('admin.send-now') }}
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
    </div>
</div>
