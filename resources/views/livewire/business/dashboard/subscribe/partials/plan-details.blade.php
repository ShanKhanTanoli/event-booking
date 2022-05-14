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
                        <h6 class="my-0">{{ $plan->name }}</h6>
                    </div>
                    <span class="text-muted">
                        {{ $plan->amount }} {{ strtoupper(Admin::Currency()) }}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Sub Total</span>
                    <strong>{{ $plan->amount }} {{ strtoupper(Admin::Currency()) }}</strong>
                </li>
            </ul>
        </div>
    </div>
</div>
