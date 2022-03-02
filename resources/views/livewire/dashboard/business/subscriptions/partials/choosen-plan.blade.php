<div class="col">
    <div class="py-4 d-flex justify-content-end">
        <h6>
            <a href="{{ route('PlatformSubscriptionsPlans') }}">
                Cancel and Change Plan
            </a>
        </h6>
    </div>
    <div class="rounded d-flex flex-column p-2">
        <div class="p-2 me-3">
            <h4>
                <strong>
                    {{ substr($plan->name, 0, 30) }}
                </strong>
            </h4>
        </div>
        <div class="p-2 d-flex">
            <div class="col">
                <strong>
                    {{ $plan->description }}
                </strong>
            </div>
        </div>
        <div class="border-top px-2 mx-2"></div>
        <div class="p-2 d-flex">
            <div class="col">
                <strong>
                    Duration
                </strong>
            </div>
            <div class="col">
                <strong>
                    {{ $plan->invoice_period }} {{ ucfirst($plan->invoice_interval) }}
                </strong>
            </div>
        </div>
        <div class="border-top px-2 mx-2"></div>
        <div class="p-2 d-flex pt-3">
            <div class="col">
                <strong>Price</strong>
            </div>
            <div class="col">
                <strong class="text-success">{{ $plan->price }} {{ strtoupper(Settings::Currency()) }}</strong>
            </div>
        </div>
    </div>
</div>
