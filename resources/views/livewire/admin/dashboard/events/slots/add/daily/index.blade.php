<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mb-4">
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
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
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminSlotTypes', ['slug' => $event->slug, 'lang' => App::getLocale()]) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-filter opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">
                                {{ trans('admin.add-new') }}
                            </p>
                            <h4 class="mb-0">
                                {{ trans('admin.slot-types') }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-sm-12 mb-xl-0 mb-4">
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

    </div>
</div>
