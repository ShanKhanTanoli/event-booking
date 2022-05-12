<div class="container-fluid my-3 py-3">
    <div class="row mb-5">
        <!--Begin::Sidebar-->
        @include(
            'livewire.admin.dashboard.clients.partials.tab-menu'
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
                                    {{ trans('admin.sent-mails') }}
                                </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                #
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ trans('admin.table-mail-subject') }}
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ trans('admin.table-mail-message') }}
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ trans('admin.table-mail-read') }}
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                {{ trans('admin.table-mail-view') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mails as $mail)
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
                                                                {{ Str::substr($mail->subject, 0, 20) }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                {{ Str::substr($mail->message, 0, 20) }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            @if ($mail->read)
                                                                <span class="badge bg-primary">
                                                                    {{ trans('admin.table-mail-read') }}
                                                                </span>
                                                            @else
                                                                <span class="badge bg-danger">
                                                                    {{ trans('admin.table-mail-unread') }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <button class="btn btn-sm btn-success"
                                                        wire:click='ViewMail("{{ $mail->id }}")'>
                                                        <span wire:loading
                                                            wire:target='ViewMail("{{ $mail->id }}")'
                                                            class="spinner-border spinner-border-sm" role="status"
                                                            aria-hidden="true"></span>
                                                        {{ trans('admin.table-mail-view') }}
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $mails->render() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($view)
        <!--Begin::View Mail-->
        @include(
            'livewire.admin.dashboard.partials.view-mail-modal'
        )
        <!--End::View Mail-->
    @endif

    <!--Begin::Script-->
    @section('scripts')
        <script>
            Livewire.on('view', function() {
                $('#view-mail-modal').modal('show');
            })
        </script>
    @endsection
    <!--End::Script-->

</div>
