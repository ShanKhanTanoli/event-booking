<div class="card my-4">
    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
            <h6 class="text-white text-capitalize ps-3">
                {{ trans('business.subscribe-plan-details') }}
            </h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="container">
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">
                            {{ trans('business.plan') }}
                        </h6>
                    </div>
                    <span class="text-muted">
                        @if ($findproduct = Admin::FindProduct($product))
                            {{ $findproduct->name }}
                        @else
                            {{ __('NOT FOUND') }}
                        @endif
                    </span>
                </li>
                @if ($plan->type == 'recurring')
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">
                                {{ trans('business.subscribe-plan-period') }}
                            </h6>
                        </div>
                        <span class="text-muted">
                            {{ $plan->recurring->interval_count }}
                            {{ Str::ucfirst($plan->recurring->interval) }}
                        </span>
                    </li>
                @endif
                @if ($product = Admin::FindProduct($plan->product))
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">
                                {{ trans('business.subscribe-create') }}
                            </h6>
                        </div>
                        <span class="text-muted">
                            @if ($find = $product->metadata->customers)
                                {!! $find !!} Events
                            @else
                                Unlimited Events
                            @endif
                        </span>
                    </li>
                @endif
                @if ($product = Admin::FindProduct($plan->product))
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">
                                {{ trans('business.subscribe-create') }}
                            </h6>
                        </div>
                        <span class="text-muted">
                            @if ($find = $product->metadata->deadlines)
                                {!! $find !!} Slots
                            @else
                                Unlimited Slots
                            @endif
                        </span>
                    </li>
                @endif
                <li class="list-group-item d-flex justify-content-between">
                    <div>
                        <h6 class="my-0">
                            {{ trans('business.subscribe-sub-total') }}
                        </h6>
                    </div>
                    <strong>{{ $plan->unit_amount / 100 }} {{ strtoupper($plan->currency) }}</strong>
                </li>
            </ul>
        </div>
    </div>
</div>
