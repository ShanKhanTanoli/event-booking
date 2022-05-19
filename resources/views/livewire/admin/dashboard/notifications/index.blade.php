<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mb-4">
        <div class="col-xl-12 col-sm-12 mb-xl-0 mb-4">
            <a href="{{ route('AdminNotifications', App::getLocale()) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-bell opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ trans('admin.notifications') }}</p>
                            <h4 class="mb-0">
                                {{ Auth::user()->notifications()->count() }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            {{ trans('admin.notifications') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        #
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('admin.notification-table-message') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('admin.notification-table-date') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('admin.notification-table-mark-read') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $notification)
                                    <tr>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $loop->iteration }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ trans($notification->data['message']) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ date('d M Y', strtotime($notification->created_at)) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            @if ($notification->read_at)
                                                <button class="btn btn-sm btn-success disabled">
                                                    {{ trans('admin.notification-btn-mark-read') }}
                                                </button>
                                            @else
                                                <button class="btn btn-sm btn-success"
                                                    wire:click='MarkRead("{{ $notification->id }}")'>
                                                    <span wire:loading
                                                        wire:target='MarkRead("{{ $notification->id }}")'
                                                        class="spinner-border spinner-border-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    {{ trans('admin.notification-btn-mark-read') }}
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $notifications->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
