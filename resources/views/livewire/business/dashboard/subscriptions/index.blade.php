<div class="container-fluid">
    @include('errors.alerts')
    <div class="row mb-4">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <a href="#">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-credit-card opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ trans('business.subscriptions') }}</p>
                            <h4 class="mb-0">
                                {{ Business::CountSubscriptions(Auth::user()) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
            <a href="{{ route('BusinessPlatformPlans', App::getLocale()) }}">
                <div class="card">
                    <div class="card-header p-3 pt-2" style="border-radius: 0;">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-box-open opacity-10"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ trans('business.platform-plans') }}</p>
                            <h4 class="mb-0">
                                @if ($admin = Admin::ID())
                                    {{ Admin::CountPlans($admin->id) }}
                                @else
                                    {{ trans('business.view-all') }}
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">
                            {{ trans('business.subscriptions') }}
                        </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        #
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('business.subscription-table-plan') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('business.subscription-table-duration') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('business.subscription-table-price') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('business.subscription-table-date') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('business.subscription-table-status') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('business.subscription-table-actions') }}
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        {{ trans('business.subscription-table-end') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscriptions as $subscription)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $loop->iteration }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        @if ($admin = Admin::ID())
                                                            @if ($plan = Admin::FindPlanByPlanId($admin->id, $subscription->stripe_price))
                                                                {{ $plan->name }}
                                                            @endif
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        @if ($admin = Admin::ID())
                                                            @if ($plan = Admin::FindPlanByPlanId($admin->id, $subscription->stripe_price))
                                                                {{ $plan->interval_count }}
                                                                {{ Str::ucfirst($plan->interval) }}
                                                            @endif
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        @if ($admin = Admin::ID())
                                                            @if ($plan = Admin::FindPlanByPlanId($admin->id, $subscription->stripe_price))
                                                                {{ $plan->amount }}
                                                                {{ strtoupper($plan->currency) }}
                                                            @endif
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ date('d M Y', strtotime($subscription->created_at)) }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <span class="badge bg-info">
                                                        {{ strtoupper($subscription->stripe_status) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-success"
                                                wire:click='Cancel("{{ $subscription->stripe_price }}")'>
                                                <span wire:loading
                                                    wire:target='Cancel("{{ $subscription->stripe_price }}")'
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                {{ trans('business.subscription-table-btn-cancel') }}
                                            </button>
                                        </td>
                                        <td class="align-middle">
                                            <button class="btn btn-sm btn-danger"
                                                wire:click='End("{{ $subscription->stripe_price }}")'>
                                                <span wire:loading
                                                    wire:target='End("{{ $subscription->stripe_price }}")'
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                {{ trans('business.subscription-table-btn-end') }}
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $subscriptions->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
