<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mb-4">
        <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminEvents', App::getLocale()) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-credit-card opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                                {{ trans('admin.events') }}
                            </p>
                            <h4 class="mb-0">
                                {{ Event::count() }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminAddEvent', App::getLocale()) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-plus opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                                {{ trans('admin.add-new') }}
                            </p>
                            <h4 class="mb-0">
                                {{ trans('admin.event') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-4">
        <!--Begin::For Specific Days-->
        <div class="col-4">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 text-center">
                            {{ trans('admin.slot-specific-days') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <p class="px-4">
                        {{ trans('admin.slot-specific-info') }}
                    </p>
                </div>
                <div class="card-footer text-center">
                    <form wire:submit.prevent='SpecificDays'>
                        <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                            <span wire:loading wire:target='SpecificDays' class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true">
                            </span>
                            {{ trans('admin.save-changes') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!--End::For Specific Days-->

        <!--Begin::For Daily-->
        <div class="col-4">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 text-center">
                            {{ trans('admin.slot-daily') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <p class="px-4">
                        {{ trans('admin.slot-daily-info') }}
                    </p>
                </div>
                <div class="card-footer text-center">
                    <form wire:submit.prevent='Daily'>
                        <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                            <span wire:loading wire:target='Daily' class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true">
                            </span>
                            {{ trans('admin.save-changes') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!--End::For Daily-->

        <!--Begin::Weekly-->
        <div class="col-4">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3 text-center">
                            {{ trans('admin.slot-weekly') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <p class="px-4">
                        {{ trans('admin.slot-weekly-info') }}
                    </p>
                </div>
                <div class="card-footer text-center">
                    <form wire:submit.prevent='Weekly'>
                        <button type="submit" class="btn btn-primary" wire:attr='disabled'>
                            <span wire:loading wire:target='Weekly' class="spinner-border spinner-border-sm"
                                role="status" aria-hidden="true">
                            </span>
                            {{ trans('admin.save-changes') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <!--End::Weekly-->
    </div>
</div>
